<?php

namespace MetricsCube\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MetricsCubePermissions
 *
 * @property int $admin_role_id
 * @property int $action_id
 * @package MetricsCube\Models
 */
class MetricsCubePermissions extends Model
{
	/** @var bool $timestamps */
	public $timestamps = FALSE;
	/** @var string $table */
	protected $table = 'MetricsCube_Permissions';
	/** @var array $fillable */
	protected $fillable = [
		'id',
		'admin_role_id',
		'action_id'
	];
}
