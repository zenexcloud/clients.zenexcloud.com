<?php

namespace MetricsCube\Models;

/**
 * Class AffiliatesPending
 *
 * @package MetricsCube\Models
 */
class AffiliatesPending extends BaseModel
{

	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'affaccid',
		'amount',
		'clearingdate'
	];
	/** @var string $table */
	protected $table = 'tblaffiliatespending';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'affaccid',
		'amount',
		'clearingdate'
	];
}
