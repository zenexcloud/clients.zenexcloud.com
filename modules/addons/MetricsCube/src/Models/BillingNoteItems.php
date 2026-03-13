<?php

namespace MetricsCube\Models;

use MetricsCube\Service\Configuration;

/**
 * Class BillingNoteItems
 *
 * @package MetricsCube\Models
 */
class BillingNoteItems extends BaseModel
{
	/** @var array $checksum */
	public $checksum = [
		'id',
		'billingnote_id ',
		'note_type',
		'client_id',
		'type',
		'relid',
		'description',
		'amount',
		'taxed',
		'tax',
		'tax2',
		'taxrate',
		'taxrate2',
		'status',
		'created_at',
		'updated_at',
	];
	/** @var string $table */
	protected $table = 'tblbillingnoteitems';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'billingnote_id ',
		'note_type',
		'client_id',
		'type',
		'relid',
		'description',
		'amount',
		'taxed',
		'tax',
		'tax2',
		'taxrate',
		'taxrate2',
		'status',
		'created_at',
		'updated_at',
	];

	/**
	 * @return string
	 */
	public function getDescriptionAttribute()
	{
		if (Configuration::getInstance()->get('UserDetails') == 'on') {
			return $this->attributes['description'];
		}
		return '';
	}
}
