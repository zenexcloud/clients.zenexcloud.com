<?php

namespace MetricsCube\Models;

/**
 * Class Admins
 *
 * @package MetricsCube\Models
 */
class Admins extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'roleid',
		'username',
		'firstname',
		'lastname',
		'supportdepts'
	];
	/** @var string $table */
	protected $table = 'tbladmins';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'roleid',
		'username',
		'firstname',
		'lastname',
		'supportdepts'
	];
	/** @var array $hidden */
	protected $hidden = [
		'password',
		'uuid',
		'passwordhash',
		'authmodule',
		'authdata',
		'email',
		'signature',
		'notes',
		'template',
		'language',
		'disabled',
		'loginattempts',
		'ticketnotifications',
		'homewidgets',
		'hidden_widgets',
		'password_reset_key',
		'password_reset_data',
		'password_reset_expiry'
	];
}
