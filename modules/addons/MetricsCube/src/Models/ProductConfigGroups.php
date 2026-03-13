<?php

namespace MetricsCube\Models;

/**
 * Class ProductConfigGroups
 *
 * @package MetricsCube\Models
 */
class ProductConfigGroups extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'name'
	];
	/** @var string $table */
	protected $table = 'tblproductconfiggroups';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'name'
	];
	/** @var array $hidden */
	protected $hidden = [
		'description'
	];
}
