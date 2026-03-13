<?php

namespace MetricsCube\Models;

/**
 * Class DomainPricing
 *
 * @package MetricsCube\Models
 */
class DomainPricing extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'extension',
		'dnsmanagement',
		'emailforwarding',
		'idprotection',
		'eppcode',
		'autoreg',
		'order',
		'group'
	];
	/** @var string $table */
	protected $table = 'tbldomainpricing';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'extension',
		'dnsmanagement',
		'emailforwarding',
		'idprotection',
		'eppcode',
		'autoreg',
		'order',
		'group'
	];
}
