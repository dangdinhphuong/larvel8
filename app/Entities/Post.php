<?php

namespace App\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Post.
 *
 * @package namespace App\Entities;
 */
class Post extends Model implements TranslatableContract, Transformable
{
    use TransformableTrait;
    use Translatable;
    use PresentableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_ids', 'thumbnail', 'status', 'author', 'type'];
    public $translatedAttributes = ['name', 'slug', 'short_description', 'content'];
    protected $with = ['translations'];
    protected $casts = [
        'category_ids' => 'array',
        'created_at' => 'datetime:d-m-Y',
    ];

    function authorModel(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'author');
    }

    const STATUS = [
        0 => 'admin.status.pending',
        1 => 'admin.status.approved'
    ];

}
