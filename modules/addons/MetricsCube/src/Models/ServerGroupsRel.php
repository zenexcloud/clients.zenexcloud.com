<?php

namespace MetricsCube\Models;

/**
 * Class ServerGroupsRel
 *
 * @package MetricsCube\Models
 */
class ServerGroupsRel extends BaseModel
{

	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'groupid',
		'serverid'
	];
	/** @var string $table */
	protected $table = 'tblservergroupsrel';
	/** @var array $fillable */
	protected $fillable = [
		'groupid',
		'serverid'
	];

	/**
	 * @return bool
	 */
	public static function hasOrderBy ()
	{
		return TRUE;
	}
}
