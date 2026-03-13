<?php

namespace MetricsCube\Models;

/**
 * Class Bundles
 *
 * @package MetricsCube\Models
 */
class Bundles extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'name',
		'validfrom',
		'validuntil',
		'uses',
		'maxuses',
		'gid',
		'displayprice',
		'sortorder'
	];
	/** @var string $table */
	protected $table = 'tblbundles';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'name',
		'validfrom',
		'validuntil',
		'uses',
		'maxuses',
		'itemdata',
		'allowpromo',
		'showgroup',
		'gid',
		'displayprice',
		'sortorder',
		'is_featured'
	];
	/** @var array $hidden */
	protected $hidden = [
		'description'
	];
}
