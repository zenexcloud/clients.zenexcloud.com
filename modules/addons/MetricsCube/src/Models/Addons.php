<?php

namespace MetricsCube\Models;

/**
 * Class Addons
 *
 * @package MetricsCube\Models
 */
class Addons extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'packages',
		'name',
		'billingcycle'
	];
	/** @var string $table */
	protected $table = 'tbladdons';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'packages',
		'name',
		'description',
		'billingcycle',
		'tax',
		'showorder',
		'type',
		'server_group_id'
	];
	/** @var array $hidden */
	protected $hidden = [
		'downloads',
		'autoactivate',
		'suspendproduct',
		'welcomeemail',
		'weight',
		'autolinkby'
	];
}
