<?php

namespace MetricsCube\Models;

/**
 * Class QuoteItems
 *
 * @package MetricsCube\Models
 */
class QuoteItems extends BaseModel
{

	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'quoteid',
		'quantity',
		'unitprice',
		'discount',
		'taxable'
	];
	/** @var string $table */
	protected $table = 'tblquoteitems';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'quoteid',
		'quantity',
		'unitprice',
		'discount',
		'taxable'
	];
	/** @var array $hidden */
	protected $hidden = [
		'description'
	];

	/**
	 * @return Quotes
	 */
	public function quote ()
	{
		return $this->hasOne(Quotes::class, 'id', 'quoteid');
	}
}
