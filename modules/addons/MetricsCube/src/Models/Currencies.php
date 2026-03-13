<?php

namespace MetricsCube\Models;

/**
 * Class Currencies
 *
 * @package MetricsCube\Models
 */
class Currencies extends BaseModel
{

	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'code',
		'prefix',
		'suffix',
		'format',
		'rate',
		'default'
	];
	/** @var string $table */
	protected $table = 'tblcurrencies';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'code',
		'prefix',
		'suffix',
		'format',
		'rate',
		'default'
	];
}
