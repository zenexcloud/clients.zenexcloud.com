<?php

namespace MetricsCube\Models;

/**
 * Class ServerGroups
 *
 * @package MetricsCube\Models
 */
class ServerGroups extends BaseModel
{

	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'name',
		'filltype'
	];
	/** @var string $table */
	protected $table = 'tblservergroups';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'name',
		'filltype'
	];
}
