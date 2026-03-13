<?php

namespace MetricsCube\Models;

/**
 * Class TicketTags
 *
 * @package MetricsCube\Models
 */
class TicketTags extends BaseModel
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var array $checksum */
	public $checksum = [
		'id',
		'ticketid',
		'tag'
	];
	/** @var string $table */
	protected $table = 'tbltickettags';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'ticketid',
		'tag'
	];

	/**
	 * @return Tickets
	 */
	public function ticket ()
	{
		return $this->hasOne(Tickets::class, 'id', 'ticketid');
	}

}
