<?php

namespace MetricsCube\Models;

/**
 * Class ProductConfigOptionsSub
 *
 * @package MetricsCube\Models
 */
class ProductConfigOptionsSub extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'configid',
		'optionname',
		'sortorder',
		'hidden'
	];
	/** @var string $table */
	protected $table = 'tblproductconfigoptionssub';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'configid',
		'optionname',
		'sortorder',
		'hidden'
	];
}
