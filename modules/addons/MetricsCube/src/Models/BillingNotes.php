<?php

namespace MetricsCube\Models;

/**
 * Class BillingNotes
 *
 * @package MetricsCube\Models
 */
class BillingNotes extends BaseModel
{
	/** @var array $checksum */
	public $checksum = [
		'id',
		'note_type',
		'custom_number',
		'client_id',
		'date_issued',
		'subtotal',
		'tax',
		'tax2',
		'total',
		'taxrate',
		'taxrate2',
		'status',
		'notes',
		'created_at',
		'updated_at',
	];
	/** @var string $table */
	protected $table = 'tblbillingnotes';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'note_type',
		'custom_number',
		'client_id',
		'date_issued',
		'subtotal',
		'tax',
		'tax2',
		'total',
		'taxrate',
		'taxrate2',
		'status',
		'notes',
		'created_at',
		'updated_at',
	];
}
