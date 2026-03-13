<?php

namespace MetricsCube\Models;

/**
 * Class AdminPerms
 *
 * @package MetricsCube\Models
 */
class AdminPerms extends BaseModel
{

	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'roleid',
		'permid'
	];
	/** @var string $table */
	protected $table = 'tbladminperms';
	/** @var array $fillable */
	protected $fillable = [
		'roleid',
		'permid'
	];

	/**
	 * @return bool
	 */
	public static function hasOrderBy ()
	{
		return TRUE;
	}
}
