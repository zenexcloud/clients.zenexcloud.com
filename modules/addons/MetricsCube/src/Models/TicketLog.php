<?php

namespace MetricsCube\Models;

/**
 * Class TicketFeedback
 *
 * @package MetricsCube\Models
 */
class TicketLog extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var string $table */
	protected $table = 'tblticketlog';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'date',
		'tid',
		'action'
	];
	/** @var array $hidden */
	protected $hidden = [
	];
	/** @var array $checksum */
	protected $checksum = [
		'id',
		'date',
		'tid',
	];
}
