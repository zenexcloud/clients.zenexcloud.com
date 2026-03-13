<?php

namespace MetricsCube\Models;

/**
 * Class BillableItems
 *
 * @package MetricsCube\Models
 */
class BillableItems extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'userid',
		'description',
		'hours',
		'amount',
		'recur',
		'recurcycle',
		'recurfor',
		'duedate',
		'invoicecount'
	];
	/** @var string $table */
	protected $table = 'tblbillableitems';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'userid',
		'description',
		'hours',
		'amount',
		'recur',
		'recurcycle',
		'recurfor',
		'invoiceaction',
		'duedate',
		'invoicecount'
	];
	/** @var array $hidden */
	protected $hidden = [
		
	];
}
