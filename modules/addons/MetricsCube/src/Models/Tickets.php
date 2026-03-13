<?php

namespace MetricsCube\Models;

use MetricsCube\Service\Configuration;

/**
 * Class Tickets
 *
 * @package MetricsCube\Models
 */
class Tickets extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var string $table */
	protected $table = 'tbltickets';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'tid',
		'did',
		'userid',
		'contactid',
		'date',
		'title',
		'status',
		'urgency',
		'admin',
		'lastreply',
		'flag',
		'clientunread',
		'adminunread',
		'replyingadmin',
		'replyingtime',
		'service',
		'merged_ticket_id',
		'editor'
	];
	/** @var array $hidden */
	protected $hidden = [
		'name',
		'email',
		'cc',
		'c',
		'message',
		'attachment',
	];
	/** @var array $checksum */
	protected $checksum = [
		'id',
		'tid',
		'did',
		'userid',
		'contactid',
		'date',
		'status',
		'urgency',
		'admin',
		'lastreply',
		'flag',
		'replyingadmin',
		'replyingtime',
		'service',
		'merged_ticket_id'
	];

	/**
	 * @return string
	 */
	public function getTitleAttribute ()
	{
		if (Configuration::getInstance()->get('UserDetails') == 'on') {
			return $this->attributes['title'];
		}
		return '';
	}
}
