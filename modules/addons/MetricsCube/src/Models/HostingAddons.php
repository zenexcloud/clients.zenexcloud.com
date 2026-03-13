<?php

namespace MetricsCube\Models;

/**
 * Class HostingAddons
 *
 * @package MetricsCube\Models
 */
class HostingAddons extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'orderid',
		'hostingid',
		'addonid',
		'name',
		'setupfee',
		'recurring',
		'billingcycle',
		'tax',
		'status',
		'regdate',
		'nextduedate',
		'nextinvoicedate',
		'termination_date',
		'paymentmethod'
	];
	/** @var string $table */
	protected $table = 'tblhostingaddons';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'orderid',
		'hostingid',
		'addonid',
		'name',
		'setupfee',
		'recurring',
		'billingcycle',
		'tax',
		'status',
		'regdate',
		'nextduedate',
		'nextinvoicedate',
		'termination_date',
		'paymentmethod'
	];
	/** @var array $hidden */
	protected $hidden = [
		'notes'
	];

	/**
	 * @return Hostings
	 */
	public function hosting ()
	{
		return $this->hasOne(Hosting::class, 'id', 'hostingid');
	}
}
