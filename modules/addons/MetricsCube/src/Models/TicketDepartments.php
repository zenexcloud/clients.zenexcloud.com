<?php

namespace MetricsCube\Models;

/**
 * Class TicketDepartments
 *
 * @package MetricsCube\Models
 */
class TicketDepartments extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'name'
	];
	/** @var string $table */
	protected $table = 'tblticketdepartments';
	/** @var array $hidden */
	protected $hidden = [
		'password',
		'description',
		'email',
		'clientsonly',
		'piperepliesonly',
		'noautoresponder',
		'hidden',
		'order',
		'host',
		'port',
		'login',
		'feedback_request'
	];
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'name'
	];
}
