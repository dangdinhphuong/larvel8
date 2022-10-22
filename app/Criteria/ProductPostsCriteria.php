<?php

namespace App\Criteria;

use App\Entities\Category;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ProductPostsCriteria.
 *
 * @package namespace App\Criteria;
 */
class ProductPostsCriteria implements CriteriaInterface
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
        $model->where('categories.type', '=', Category::TYPE_PRODUCT);
        return $model;
    }
}
