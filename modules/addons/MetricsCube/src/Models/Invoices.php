<?php

namespace MetricsCube\Models;

/**
 * Class Invoices
 *
 * @package MetricsCube\Models
 */
class Invoices extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'userid',
		'invoicenum',
		'date',
		'duedate',
		'datepaid',
		'date_refunded',
		'date_cancelled',
		'subtotal',
		'credit',
		'tax',
		'tax2',
		'total',
		'taxrate',
		'taxrate2',
		'status',
		'paymentmethod',
		'notes'
	];
	/** @var string $table */
	protected $table = 'tblinvoices';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'userid',
		'invoicenum',
		'date',
		'duedate',
		'datepaid',
		'last_capture_attempt',
		'date_refunded',
		'date_cancelled',
		'subtotal',
		'credit',
		'tax',
		'tax2',
		'total',
		'taxrate',
		'taxrate2',
		'status',
		'paymentmethod',
		'notes'
	];
	/** @var array $hidden */
	protected $hidden = [

	];
}
