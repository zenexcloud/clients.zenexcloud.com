<?php

namespace MetricsCube\Models;

/**
 * Class Credits
 *
 * @package MetricsCube\Models
 */
class Credits extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'clientid',
		'date',
		'amount',
		'relid',
		'billing_note_id',
	];
	/** @var string $table */
	protected $table = 'tblcredit';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'clientid',
		'date',
		'amount',
		'relid',
		'billing_note_id'
	];
	/** @var array $hidden */
	protected $hidden = [
		'description'
	];
}
