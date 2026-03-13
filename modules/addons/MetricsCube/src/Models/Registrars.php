<?php

namespace MetricsCube\Models;

/**
 * Class Registrars
 *
 * @package MetricsCube\Models
 */
class Registrars extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'registrar'
	];
	/** @var string $table */
	protected $table = 'tblregistrars';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'registrar'
	];
	/** @var array $hidden */
	protected $hidden = [
		'setting',
		'value'
	];
}
