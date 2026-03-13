<?php

namespace MetricsCube\Models;

/**
 * Class Promotions
 *
 * @package MetricsCube\Models
 */
class Promotions extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'type',
		'recurring',
		'value',
		'cycles',
		'startdate',
		'expirationdate',
		'maxuses',
		'uses',
		'lifetimepromo',
		'applyonce',
		'newsignups',
		'existingclient',
		'onceperclient',
		'recurfor',
		'upgrades'
	];
	/** @var string $table */
	protected $table = 'tblpromotions';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'type',
		'recurring',
		'value',
		'cycles',
		'appliesto',
		'requires',
		'requiresexisting',
		'startdate',
		'expirationdate',
		'maxuses',
		'uses',
		'lifetimepromo',
		'applyonce',
		'newsignups',
		'existingclient',
		'onceperclient',
		'recurfor',
		'upgrades',
	];
	/** @var array $hidden */
	protected $hidden = [
		'code',
		'upgradeconfig',
		'notes'
	];
}
