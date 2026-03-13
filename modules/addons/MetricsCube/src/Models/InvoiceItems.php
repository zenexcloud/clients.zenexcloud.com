<?php

namespace MetricsCube\Models;

/**
 * Class InvoiceItems
 *
 * @package MetricsCube\Models
 */
class InvoiceItems extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'invoiceid',
		'userid',
		'type',
		'relid',
		'description',
		'amount',
		'taxed',
		'duedate',
		'paymentmethod',
		'notes'
	];
	/** @var string $table */
	protected $table = 'tblinvoiceitems';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'invoiceid',
		'userid',
		'type',
		'relid',
		'description',
		'amount',
		'taxed',
		'duedate',
		'paymentmethod',
		'notes'
	];
	/** @var array $hidden */
	protected $hidden = [
	];

	/**
	 * @return Invoices
	 */
	public function invoice()
	{
		return $this->hasOne(Invoices::class, 'id', 'invoiceid');
	}
}
