<?php

namespace MetricsCube\Models;

/**
 * Class Servers
 *
 * @package MetricsCube\Models
 */
class Servers extends BaseModel
{

	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'name',
		'maxaccounts',
		'type',
		'active',
		'disabled'
	];
	/** @var string $table */
	protected $table = 'tblservers';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'name',
		'monthlycost',
		'noc',
		'statusaddress',
		'maxaccounts',
		'type',
		'active',
		'disabled'
	];
	/** @var array $hidden */
	protected $hidden = [
		'ipaddress',
		'assignedips',
		'hostname',
		'nameserver1',
		'nameserver1ip',
		'nameserver2',
		'nameserver2ip',
		'nameserver3',
		'nameserver3ip',
		'nameserver4',
		'nameserver4ip',
		'nameserver5',
		'nameserver5ip',
		'username',
		'password',
		'accesshash',
		'secure',
		'port',
	];
}
