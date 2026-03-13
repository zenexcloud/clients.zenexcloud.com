<?php

namespace MetricsCube\Models;

/**
 * Class SSLOrders
 *
 * @package MetricsCube\Models
 */
class SSLOrders extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'userid',
		'service_id',
		'addon_id',
		'remoteid',
		'module',
		'completiondate',
		'status'
	];
	/** @var string $table */
	protected $table = 'tblsslorders';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'userid',
		'service_id',
		'addon_id',
		'remoteid',
		'module',
		'completiondate',
		'status'
	];
	/** @var array $hidden */
	protected $hidden = [
		'certtype',
		'configdata'
	];
}
