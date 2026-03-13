<?php

namespace MetricsCube\Models;

/**
 * Class DomainPricingPremium
 *
 * @package MetricsCube\Models
 */
class DomainPricingPremium extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'to_amount',
		'markup'
	];
	/** @var string $table */
	protected $table = 'tbldomainpricing_premium';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'to_amount',
		'markup'
	];
}
