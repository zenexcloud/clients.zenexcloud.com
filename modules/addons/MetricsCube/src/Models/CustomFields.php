<?php

namespace MetricsCube\Models;

/**
 * Class CustomFields
 *
 * @package MetricsCube\Models
 */
class CustomFields extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'type',
		'relid',
		'fieldname',
		'fieldtype',
	];
	/** @var string $table */
	protected $table = 'tblcustomfields';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'type',
		'relid',
		'fieldname',
		'fieldtype',
		'fieldoptions',
		'regexpr',
		'adminonly',
		'required',
		'showorder',
		'showinvoice',
		'sortorder'
	];
	/** @var array $hidden */
	protected $hidden = [
		'description'
	];
}
