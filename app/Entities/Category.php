<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

/**
 * Class Category.
 *
 * @package namespace App\Entities;
 */
class Category extends Model implements TranslatableContract, Transformable
{
    use TransformableTrait;
    use PresentableTrait;
    use Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'parent_id'
    ];
    public $searchAble = [
        'name',
    ];
    public $translatedAttributes = ['name', 'slug'];
    protected $with = ['translations'];

    const TYPE_FAQ = 1;
    const TYPE_BLOG = 2;
    const TYPE_PRODUCT = 3;
    const TYPE_RECRUIT = 4;

    const TYPE = [
        self::TYPE_FAQ => 'admin.page.category.type.faq',
        self::TYPE_BLOG => 'admin.page.category.type.blog',
        self::TYPE_PRODUCT => 'admin.page.category.type.product',
        self::TYPE_RECRUIT => 'admin.page.category.type.recruit',
    ];
}
