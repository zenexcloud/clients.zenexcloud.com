<?php

namespace MetricsCube\Models;

/**
 * Class ProductConfigLinks
 *
 * @package MetricsCube\Models
 */
class ProductConfigLinks extends BaseModel
{

	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'gid',
		'pid'
	];
	/** @var string $table */
	protected $table = 'tblproductconfiglinks';
	/** @var array $fillable */
	protected $fillable = [
		'gid',
		'pid'
	];

	/**
	 * @return bool
	 */
	public static function hasOrderBy ()
	{
		return TRUE;
	}
}
