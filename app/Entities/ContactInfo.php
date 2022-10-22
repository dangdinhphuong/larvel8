<?php

namespace App\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ContactInfo.
 *
 * @package namespace App\Entities;
 */
class ContactInfo extends Model implements TranslatableContract, Transformable
{
    use TransformableTrait;
    use Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'position'];

    public $translatedAttributes = ['name', 'address', 'email', 'phone'];

    const STATUS = [
        0 => 'admin.status.deactivated',
        1 => 'admin.status.activated'
    ];
}
