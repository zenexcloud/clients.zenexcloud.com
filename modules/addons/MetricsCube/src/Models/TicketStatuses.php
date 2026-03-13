<?php

namespace MetricsCube\Models;

/**
 * Class TicketStatuses
 *
 * @package MetricsCube\Models
 */
class TicketStatuses extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'title',
		'color'
	];
	/** @var string $table */
	protected $table = 'tblticketstatuses';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'title',
		'color',
		'sortorder',
		'showactive',
		'showawaiting',
		'autoclose'
	];
}
