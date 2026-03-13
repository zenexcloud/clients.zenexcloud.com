<?php

namespace MetricsCube\Models;

/**
 * Class TicketFeedback
 *
 * @package MetricsCube\Models
 */
class TicketFeedback extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'ticketid',
		'adminid',
		'rating',
		'datetime'
	];
	/** @var string $table */
	protected $table = 'tblticketfeedback';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'ticketid',
		'adminid',
		'rating',
		'datetime'
	];
	/** @var array $hidden */
	protected $hidden = [
		'comments',
		'ip'
	];

}
