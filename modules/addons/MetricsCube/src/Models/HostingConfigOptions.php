<?php

namespace MetricsCube\Models;

/**
 * Class HostingConfigOptions
 *
 * @package MetricsCube\Models
 */
class HostingConfigOptions extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'relid',
		'configid',
		'optionid',
		'qty'
	];
	/** @var string $table */
	protected $table = 'tblhostingconfigoptions';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'relid',
		'configid',
		'optionid',
		'qty'
	];

	/**
	 * @return Hostings
	 */
	public function hosting ()
	{
		return $this->hasOne(Hosting::class, 'id', 'relid');
	}
}
