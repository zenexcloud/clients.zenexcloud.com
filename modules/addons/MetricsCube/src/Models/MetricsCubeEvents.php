<?php

namespace MetricsCube\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Events
 *
 * @property string $hook
 * @property array $data
 * @property string $date
 * @property string $created_at
 * @package MetricsCube\Models
 */
class MetricsCubeEvents extends Model
{
    /** @var bool $timestamps */
    public $timestamps = FALSE;
    /** @var string $table */
    protected $table = 'MetricsCube_Events';
    /** @var array $fillable */
    protected $fillable = [
        'id',
        'hook',
        'data',
        'date',
        'created_at'
    ];

    /**
     * @param $details
     * @return mixed
     */
    public function getDataAttribute($details)
    {
        return json_decode($details, TRUE);
    }

    /**
     * @param $value
     */
    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);
    }
}
