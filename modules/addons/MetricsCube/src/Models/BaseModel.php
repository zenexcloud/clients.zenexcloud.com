<?php

namespace MetricsCube\Models;

use Exception;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseModel
 *
 * @package MetricsCube\Models
 */
abstract class BaseModel extends Model
{
	/** @var null $domainInfo */
	protected $domainInfo = null;

	/** @var array $checksum */
	protected $checksum = [];

	/**
	 *
	 * @param array $attributes
	 * @param array $options
	 * @return type
	 * @throws Exception
	 */
	public function save (array $attributes = [], array $options = [])
	{
		return $this->handle();
	}

	/**
	 *
	 * @throws Exception
	 */
	protected function handle ()
	{
		throw new Exception('Sorry, not this time!');
	}

	/**
	 *
	 * @param array $attributes
	 * @param array $options
	 * @return type
	 * @throws Exception
	 */
	public function update (array $attributes = [], array $options = [])
	{
		return $this->handle();
	}

	/**
	 *
	 * @return type
	 * @throws Exception
	 */
	public function delete ()
	{
		return $this->handle();
	}

	/**
	 *
	 * @param Builder $query
	 * @param type $conditions
	 * @return Builder
	 */
	public function scopeConditions (Builder $query, $conditions)
	{
		foreach ($conditions as $condition) {
			if (in_array($condition[0], $this->fillable) || method_exists($this, $condition[0])) {
				if (isset($condition[1]) && $condition[1] == 'like' && isset($condition[2]) && is_array($condition[2])) {
					$query->where(function ($query) use ($condition) {
						foreach ($condition[2] as $word) {
							$query->orWhere($condition[0], 'LIKE', $word);
						}
					});
				} elseif (isset($condition[1]) && $condition[1] == 'raw' && isset($condition[2])) {
					$query->whereRaw(DB::raw($condition[2]));
				} elseif (count($condition) == 4) {
					$query = $query->whereHas($condition[0], function ($subQuery) use ($condition) {
						$subQuery->where($condition[1], htmlspecialchars_decode($condition[2]), $condition[3]);
					});
				} elseif (count($condition) == 3) {
					$query = $query->where($condition[0], htmlspecialchars_decode($condition[1]), $condition[2]);
				} else {
					$query = $query->where($condition[0], $condition[1]);
				}
			}
		}
		return $query;
	}

	/**
	 *
	 * @param Builder $query
	 * @param type $fields
	 * @return Builder
	 */
	public function scopeFields (Builder $query, $fields)
	{
		foreach ($fields as $field) {
			$query = $query->addSelect($field);
		}
		return $query;
	}

	/**
	 *
	 * @param Builder $query
	 * @param type $orders
	 * @return Builder
	 */
	public function scopeAddOrder (Builder $query, $orders)
	{
		if ($orders === FALSE) {
			if (in_array('id', $this->fillable)) {
				$query = $query->orderBy('id', 'asc');
			}
		} else {
			foreach ($orders as $order) {
				$query = $query->orderBy($order[0], isset($order[1]) ? $order[1] : 'asc');
			}
		}
		return $query;
	}

	/**
	 * @return mixed
	 */
	public function getTldAttribute ()
	{
		$this->checkDomain();
		return $this->domainInfo->suffix;
	}

	/**
	 *
	 */
	private function checkDomain ()
	{
		if (is_null($this->domainInfo)) {
			$this->domainInfo = tld_extract($this->attributes['domain']);
		}
	}

	/**
	 * @return mixed
	 */
	public function getSubdomainAttribute ()
	{
		$this->checkDomain();
		return $this->domainInfo->subdomain;
	}

	/**
	 * @param $domain
	 * @return string
	 */
	public function getDomainHashAttribute ($domain)
	{
		return hash('sha256', $this->attributes['domain']);
	}

	public function calcCheckSum ($conditions)
	{
		$fields = $this->checksum;
		if (count($fields) > 0) {
			$fields = implode(',', array_map(function ($item) {
				return sprintf('`%s`', $item);
			}, $fields));
		} else {
			$fields = '*';
		}
		$table     = $this->getTable();
		$between   = '';
		$resultKey = 'all';
		if (isset($conditions['from']) && isset($conditions['to'])) {
			$resultKey = sprintf('%d-%d', (int)$conditions['from'], (int)$conditions['to']);
			$between   = sprintf('WHERE `%s`.`%s` BETWEEN %d AND %d', (string)$table, (string)$this->getKeyName(), (int)$conditions['from'], (int)$conditions['to']);
		}
		$query = <<<EOF
SELECT SUM(checktemptable.checksum) as `checksum` FROM (
	SELECT CRC32(CONCAT({$fields}))
	 AS `checksum` FROM {$table} {$between}
 ) AS `checktemptable`
EOF;
		try {
			$result = DB::select($query);
			if (isset($result[0]->checksum)) {
				return [
					$resultKey => $result[0]->checksum
				];
			}
		} catch (\Exception $exception) {

		}
		return [$resultKey => FALSE];
	}

	public function calcCount ($conditions)
	{
		$query = $this;
		if (isset($conditions['conditions'])) {
			$query = $this->conditions(unserialize(base64_decode($conditions['conditions'])));
		}
		$count = $query->count();
		if (static::hasOrderBy()) {
			$lastId  = $query->orderBy('id', 'desc')->first();
			$firstId = $query->orderBy('id', 'asc')->first();
			return [
				'count' => $count,
				'firstId' => is_null($firstId) ? 0 : $firstId->id,
				'lastId' => is_null($lastId) ? 0 : $lastId->id
			];
		} else {
			return [
				'count' => $count,
				'firstId' => 1,
				'lastId' => $count
			];
		}
	}

	/**
	 * @return bool
	 */
	public static function hasOrderBy ()
	{
		return TRUE;
	}

	/**
	 * @param array $conditions
	 * @return mixed
	 */
	public function makeDownload ($conditions)
	{
		$query = $this;
		if (isset($conditions['conditions'])) {
			$query = $this->conditions(unserialize(base64_decode($conditions['conditions'])));
		}
		if (!isset($conditions['from']) || !isset($conditions['to'])) {
			return $query->get()->toArray();
		}
		return $query->whereBetween((string)$this->getKeyName(), [$conditions['from'], $conditions['to']])->get()->toArray();
	}

	/**
	 *
	 * @param Builder $query
	 * @param array $options
	 * @return type
	 * @throws Exception
	 */
	protected function performUpdate (Builder $query, array $options = [])
	{
		return $this->handle();
	}

	/**
	 *
	 * @param Builder $query
	 * @param array $options
	 * @return type
	 * @throws Exception
	 */
	protected function performInsert (Builder $query, array $options = [])
	{
		return $this->handle();
	}

	/**
	 *
	 * @return type
	 * @throws Exception
	 */
	protected function performDeleteOnModel ()
	{
		return $this->handle();
	}

}
