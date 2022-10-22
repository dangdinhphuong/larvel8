<?php

namespace App\Criteria;

use App\Entities\Category;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FAQPostsCriteria.
 *
 * @package namespace App\Criteria;
 */
class FAQPostsCriteria implements CriteriaInterface
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
        $model->where('categories.type', '=', Category::TYPE_FAQ);
        return $model;
    }
}
