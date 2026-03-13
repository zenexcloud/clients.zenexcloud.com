<?php

namespace MetricsCube\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Events
 *
 * @property int    parent_id
 * @property string $action
 * @property string $title
 * @package MetricsCube\Models
 */
class MetricsCubeActions extends Model
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var string $table */
	protected $table = 'MetricsCube_Actions';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'parent_id',
		'action',
		'title'
	];
}
