<?php

namespace MetricsCube\Models;

/**
 * Class TicketReplies
 *
 * @package MetricsCube\Models
 */
class TicketReplies extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var string $table */
	protected $table = 'tblticketreplies';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'tid',
		'userid',
		'contactid',
		'date',
		'admin',
		'rating',
		'editor'
	];
	/** @var array $hidden */
	protected $hidden = [
		'name',
		'email',
		'message',
		'attachment'
	];
	/** @var array $checksum */
	protected $checksum = [
		'id',
		'tid',
		'userid',
		'contactid',
		'date',
		'admin',
	];
}
