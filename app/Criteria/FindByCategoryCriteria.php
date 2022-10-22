<?php

namespace App\Criteria;

use App\Entities\Category;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByCategoryCriteria.
 *
 * @package namespace App\Criteria;
 */
class FindByCategoryCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->leftJoin('categories', 'posts.category_id', '=', 'categories.id');
        if (!is_null(request()->route('slug'))){
            $category_ids = Category::whereTranslation('slug', request()->route('slug'))
                ->get()
                ->pluck('id');
            $model->whereIn('categories.id', $category_ids);
        }
        return $model;
    }
}
