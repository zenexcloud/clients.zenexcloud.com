<?php

namespace MetricsCube\Models;

/**
 * Class MultibrandRelations
 *
 * @package MetricsCube\Models
 */
class MultibrandRelations extends BaseModel
{

	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'brand_id',
		'type',
		'relid'
	];
	/** @var string $table */
	protected $table = 'Multibrand_Relations';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'brand_id',
		'type',
		'relid'
	];
	/** @var array $hidden */
	protected $hidden = [
		'created_at',
		'updated_at'
	];
}
