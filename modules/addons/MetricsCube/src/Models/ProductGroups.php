<?php

namespace MetricsCube\Models;

/**
 * Class ProductGroups
 *
 * @package MetricsCube\Models
 */
class ProductGroups extends BaseModel
{
	/** @var array $checksum */
	public $checksum = [
		'id',
		'name',
		'hidden',
		'order'
	];
	/** @var string $table */
	protected $table = 'tblproductgroups';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'name',
		'headline',
		'tagline',
		'orderfrmtpl',
		'disabledgateways',
		'hidden',
		'order'
	];
}
