<?php

namespace App\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Slider.
 *
 * @package namespace App\Entities;
 */
class Slider extends Model implements Transformable
{
    use TransformableTrait;
    use Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'position'];
    public $translatedAttributes = ['thumbnail', 'content'];

    const STATUS = [
        0 => 'admin.status.deactivated',
        1 => 'admin.status.activated'
    ];
}
