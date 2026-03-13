<?php

namespace MetricsCube\Models;

/**
 * Class Orders
 *
 * @package MetricsCube\Models
 */
class Orders extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'ordernum',
		'userid',
		'contactid',
		'date',
		'promocode',
		'promotype',
		'promovalue',
		'amount',
		'paymentmethod',
		'invoiceid',
		'status',
		'notes'
	];
	/** @var string $table */
	protected $table = 'tblorders';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'ordernum',
		'userid',
		'contactid',
		'date',
		'promocode',
		'promotype',
		'promovalue',
		'amount',
		'paymentmethod',
		'invoiceid',
		'status',
		'notes'
	];
	/** @var array $hidden */
	protected $hidden = [
		'nameservers',
		'transfersecret',
		'renewals',
		'orderdata',
		'ipaddress',
		'fraudmodule',
		'fraudoutput',
	];
}
