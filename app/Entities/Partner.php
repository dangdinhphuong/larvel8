<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Partner.
 *
 * @package namespace App\Entities;
 */
class Partner extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['logo', 'status', 'type'];


    const TYPE_VENDOR = 1;
    const TYPE_SPONSOR = 2;
    const TYPE_CUSTOMER = 3;

    const TYPE = [
        self::TYPE_VENDOR => 'admin.page.partner.type.vendor',
        self::TYPE_SPONSOR => 'admin.page.partner.type.sponsor',
        self::TYPE_CUSTOMER => 'admin.page.partner.type.customer',
    ];
    const STATUS = [
        0 => 'admin.status.deactivated',
        1 => 'admin.status.activated'
    ];
}
