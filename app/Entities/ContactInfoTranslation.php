<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ContactInfoTranslation.
 *
 * @package namespace App\Entities;
 */
class ContactInfoTranslation extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'address', 'email', 'phone'];

    public $searchAble = ['name', 'address', 'email', 'phone'];
}
