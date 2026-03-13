<?php

namespace MetricsCube\Models;

/**
 * Class MultibrandBrands
 *
 * @package MetricsCube\Models
 */
class MultibrandBrands extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'name',
		'domain'
	];
	/** @var string $table */
	protected $table = 'Multibrand_Brands';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'name',
		'domain'
	];
	/** @var array $hidden */
	protected $hidden = [
		'created_at',
		'updated_at'
	];
}
