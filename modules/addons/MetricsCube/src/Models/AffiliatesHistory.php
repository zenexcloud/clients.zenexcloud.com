<?php

namespace MetricsCube\Models;

/**
 * Class AffiliatesHistory
 *
 * @package MetricsCube\Models
 */
class AffiliatesHistory extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'affiliateid',
		'date',
		'affaccid',
		'amount'
	];
	/** @var string $table */
	protected $table = 'tblaffiliateshistory';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'affiliateid',
		'date',
		'affaccid',
		'amount'
	];
	/** @var array $hidden */
	protected $hidden = [
		'description'
	];
}
