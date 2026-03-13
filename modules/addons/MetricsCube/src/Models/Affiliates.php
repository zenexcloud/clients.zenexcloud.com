<?php

namespace MetricsCube\Models;

/**
 * Class Affiliates
 *
 * @package MetricsCube\Models
 */
class Affiliates extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'date',
		'clientid',
		'visitors',
		'paytype',
		'payamount',
		'onetime',
		'balance',
		'withdrawn'
	];
	/** @var string $table */
	protected $table = 'tblaffiliates';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'date',
		'clientid',
		'visitors',
		'paytype',
		'payamount',
		'onetime',
		'balance',
		'withdrawn'
	];
}
