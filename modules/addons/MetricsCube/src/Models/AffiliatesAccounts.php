<?php

namespace MetricsCube\Models;

/**
 * Class AffiliatesAccounts
 *
 * @package MetricsCube\Models
 */
class AffiliatesAccounts extends BaseModel
{

	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'affiliateid',
		'relid',
		'lastpaid'
	];
	/** @var string $table */
	protected $table = 'tblaffiliatesaccounts';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'affiliateid',
		'relid',
		'lastpaid'
	];
}
