<?php

namespace MetricsCube\Models;

/**
 * Class ClientGroups
 *
 * @package MetricsCube\Models
 */
class ClientGroups extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'groupname',
		'groupcolour',
	];
	/** @var string $table */
	protected $table = 'tblclientgroups';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'groupname',
		'groupcolour',
		'discountpercent',
		'susptermexempt',
		'separateinvoices'
	];

}
