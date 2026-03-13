<?php

namespace MetricsCube\Models;

/**
 * Class Upgrades
 *
 * @package MetricsCube\Models
 */
class Upgrades extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var string $table */
	protected $table = 'tblupgrades';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'userid',
		'orderid',
		'type',
		'date',
		'relid',
		'originalvalue',
		'newvalue',
		'amount',
		'recurringchange',
		'status',
		'paid'
	];
	/** @var array $checksum */
	protected $checksum = [
		'id',
		'orderid',
		'type',
		'date',
		'relid',
		'amount',
		'recurringchange',
		'status',
		'paid'
	];

}
