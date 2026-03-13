<?php

namespace MetricsCube\Models;

/**
 * Class TicketEscalations
 *
 * @package MetricsCube\Models
 */
class TicketEscalations extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'name',
		'departments',
		'statuses',
		'priorities',
		'timeelapsed',
		'newdepartment',
		'newpriority',
		'newstatus',
		'flagto',
		'notify',
	];
	/** @var string $table */
	protected $table = 'tblticketescalations';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'name',
		'departments',
		'statuses',
		'priorities',
		'timeelapsed',
		'newdepartment',
		'newpriority',
		'newstatus',
		'flagto',
		'notify'
	];
	/** @var array $hidden */
	protected $hidden = [
		'addreply',
		'editor'
	];
}
