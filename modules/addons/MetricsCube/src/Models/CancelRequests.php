<?php

namespace MetricsCube\Models;

/**
 * Class CancelRequests
 *
 * @package MetricsCube\Models
 */
class CancelRequests extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'date',
		'relid',
		'type'
	];
	/** @var string $table */
	protected $table = 'tblcancelrequests';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'date',
		'relid',
		'reason',
		'type'
	];
	/** @var array $hidden */
	protected $hidden = [
		'reason'
	];
}
