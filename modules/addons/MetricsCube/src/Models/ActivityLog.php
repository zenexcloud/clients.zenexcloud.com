<?php

namespace MetricsCube\Models;

/**
 * Class ActivityLog
 *
 * @package MetricsCube\Models
 */
class ActivityLog extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'date',
		'userid'
	];
	/** @var string $table */
	protected $table = 'tblactivitylog';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'date',
		'description',
		'userid'
	];
	/** @var array $hidden */
	protected $hidden = [
		'user',
		'ipaddr'
	];
}
