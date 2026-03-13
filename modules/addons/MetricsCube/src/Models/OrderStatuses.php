<?php

namespace MetricsCube\Models;

/**
 * Class OrderStatuses
 *
 * @package MetricsCube\Models
 */
class OrderStatuses extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'title',
		'color'
	];
	/** @var string $table */
	protected $table = 'tblorderstatuses';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'title',
		'color',
		'showpending',
		'showactive',
		'showcancelled',
		'sortorder'
	];
}
