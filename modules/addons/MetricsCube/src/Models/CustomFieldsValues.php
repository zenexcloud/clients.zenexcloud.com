<?php

namespace MetricsCube\Models;

/**
 * Class CustomFieldsValues
 *
 * @package MetricsCube\Models
 */
class CustomFieldsValues extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'fieldid',
		'relid',
		'value'
	];
	/** @var string $table */
	protected $table = 'tblcustomfieldsvalues';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'fieldid',
		'relid',
		'value'
	];
}
