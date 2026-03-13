<?php

namespace MetricsCube\Models;

/**
 * Class Pricing
 *
 * @package MetricsCube\Models
 */
class Pricing extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'type',
		'currency',
		'relid',
		'msetupfee',
		'qsetupfee',
		'ssetupfee',
		'asetupfee',
		'bsetupfee',
		'tsetupfee',
		'monthly',
		'quarterly',
		'semiannually',
		'annually',
		'biennially',
		'triennially'
	];
	/** @var string $table */
	protected $table = 'tblpricing';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'type',
		'currency',
		'relid',
		'msetupfee',
		'qsetupfee',
		'ssetupfee',
		'asetupfee',
		'bsetupfee',
		'tsetupfee',
		'monthly',
		'quarterly',
		'semiannually',
		'annually',
		'biennially',
		'triennially'
	];
}
