<?php

namespace App\Repositories\Eloquent;

use App\Entities\Category;
use App\Entities\Post;
use App\Repositories\Interfaces\PostRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PostRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Post::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function queryWithTranslate()
    {
        return $this->leftJoin(
            'post_translations',
            'post_translations.post_id',
            '=',
            'posts.id'
        )->where('post_translations.locale', app()->getLocale())
            ->select(
                'posts.*',
                'post_translations.name',
                'post_translations.slug',
                'post_translations.short_description',
                'post_translations.content'
            );
    }

    public function getRelatedPost($id, $type, $limit = 4)
    {
        return $this->queryWithTranslate()
            ->where('posts.id', '!=', $id)
            ->where('type', '=', $type)
            ->limit($limit)
            ->get();
    }

//    public function presenter()
//    {
//        return PostPresenter::class;
//    }
}
