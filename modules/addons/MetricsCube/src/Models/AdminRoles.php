<?php

namespace MetricsCube\Models;

/**
 * Class Admins
 *
 * @package MetricsCube\Models
 */
class AdminRoles extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'name'
	];
	/** @var string $table */
	protected $table = 'tbladminroles';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'name'
	];
	/** @var array $hidden */
	protected $hidden = [
		'widgets',
		'reports',
		'systememails',
		'accountemails',
		'supportemails'
	];

}
