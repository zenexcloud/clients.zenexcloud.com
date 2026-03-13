<?php

namespace MetricsCube\Models;

/**
 * Class ProductConfigOptions
 *
 * @package MetricsCube\Models
 */
class ProductConfigOptions extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'gid',
		'optionname',
		'optiontype',
	];
	/** @var string $table */
	protected $table = 'tblproductconfigoptions';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'gid',
		'optionname',
		'optiontype',
		'qtyminimum',
		'qtymaximum',
		'order',
		'hidden'
	];
}
