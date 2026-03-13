<?php

namespace MetricsCube\Models;

/**
 * Class AffiliatesWithDrawals
 *
 * @package MetricsCube\Models
 */
class AffiliatesWithDrawals extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'affiliateid',
		'date',
		'amount'
	];
	/** @var string $table */
	protected $table = 'tblaffiliateswithdrawals';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'affiliateid',
		'date',
		'amount'
	];
}
