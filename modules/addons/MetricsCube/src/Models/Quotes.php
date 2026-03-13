<?php

namespace MetricsCube\Models;

/**
 * Class Quotes
 *
 * @package MetricsCube\Models
 */
class Quotes extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'stage',
		'validuntil',
		'userid',
		'currency',
		'subtotal',
		'tax1',
		'tax2',
		'total',
		'datecreated',
		'lastmodified',
		'datesent',
		'dateaccepted'
	];
	/** @var string $table */
	protected $table = 'tblquotes';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'stage',
		'validuntil',
		'userid',
		'currency',
		'subtotal',
		'tax1',
		'tax2',
		'total',
		'datecreated',
		'lastmodified',
		'datesent',
		'dateaccepted'
	];
	/** @var array $hidden */
	protected $hidden = [
		'subject',
		'firstname',
		'lastname',
		'companyname',
		'email',
		'address1',
		'address2',
		'city',
		'state',
		'postcode',
		'country',
		'phonenumber',
		'proposal',
		'customernotes',
		'adminnotes'
	];
}
