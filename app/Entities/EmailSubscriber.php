<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class EmailSubscriber.
 *
 * @package namespace App\Entities;
 */
class EmailSubscriber extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'status', 'phone', 'option'];

    public $searchAble = ['email', 'phone'];
    const STATUS = [
        0 => 'admin.status.deactivated',
        1 => 'admin.status.activated'
    ];
}
