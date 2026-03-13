<?php

namespace MetricsCube\Models;

/**
 * Class PaymentGateways
 *
 * @package MetricsCube\Models
 */
class PaymentGateways extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'gateway',
		'setting',
		'value',
		'order'
	];
	/** @var string $table */
	protected $table = 'tblpaymentgateways';
	/** @var array $fillable */
	protected $fillable = [
		'gateway',
		'setting',
		'value',
		'order'
	];

	/**
	 * @return bool
	 */
	public static function hasOrderBy ()
	{
		return FALSE;
	}
}
