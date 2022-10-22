<?php

namespace App\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Config.
 *
 * @package namespace App\Entities;
 */
class Config extends Model implements Transformable
{
    use TransformableTrait;
    use Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'key', 'status'
    ];
    public $searchAble = [
        'key',
    ];
    public $translatedAttributes = ['value'];
    protected $with = ['translations'];

    const STATUS = [
        0 => 'admin.status.deactivated',
        1 => 'admin.status.activated'
    ];
}
