<?php

namespace MetricsCube\Models;

use MetricsCube\Service\Configuration;

/**
 * Class Accounts
 *
 * @package MetricsCube\Models
 */
class Accounts extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'userid',
		'currency',
		'gateway',
		'date',
		'description',
		'amountin',
		'fees',
		'amountout',
		'rate',
		'transid',
		'invoiceid',
		'refundid',
		'billingnoteid',
		'type',
		'relid'
	];
	/** @var string $table */
	protected $table = 'tblaccounts';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'userid',
		'currency',
		'gateway',
		'date',
		'description',
		'amountin',
		'fees',
		'amountout',
		'rate',
		'transid',
		'invoiceid',
		'refundid',
		'billingnoteid',
		'type',
		'relid'
	];

	/**
	 * @return string
	 */
	public function getDescriptionAttribute()
	{
		if (Configuration::getInstance()->get('UserDetails') == 'on') {
			return $this->attributes['description'];
		}
		return '';
	}
}
