<?php

namespace App\Repositories\Eloquent;

use App\Presenters\CategoryPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\CategoryRepository;
use App\Entities\Category;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Events\RepositoryEntityCreating;
use Prettus\Repository\Events\RepositoryEntityUpdated;
use Prettus\Repository\Events\RepositoryEntityUpdating;
use Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class CategoryRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

//    public function presenter()
//    {
//        return CategoryPresenter::class;
//    }
    public function queryWithTranslate()
    {
        return $this->leftJoin(
            'category_translations',
            'category_translations.category_id',
            '=',
            'categories.id'
        )->where('category_translations.locale', app()->getLocale())
            ->select(
            'categories.*',
            'category_translations.name',
            'category_translations.slug',
        );
    }
}
