<?php

namespace MetricsCube\Models;

/**
 * Class Accounts
 *
 * @package MetricsCube\Models
 */
class Tax extends BaseModel
{

	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'level',
		'name',
		'state',
		'country',
		'taxrate'
	];
	/** @var string $table */
	protected $table = 'tbltax';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'level',
		'name',
		'state',
		'country',
		'taxrate'
	];
}
