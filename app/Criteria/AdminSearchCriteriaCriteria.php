<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class AdminSearchCriteriaCriteria.
 *
 * @package namespace App\Criteria;
 */
class AdminSearchCriteriaCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $entity = $model->getModel();
        $request = request()->only($entity->searchAble);
        $search_array = [];
        foreach ($request as $key => $value) {
            if (!is_null($value)) {
                $search_array[] = [$key, 'like', "%" . $value . "%"];
            }
        }
        if (empty($entity->translatedAttributes)) {
            return $model->where($search_array);
        } else {
            $locale_entity = app($entity->getTranslationModelName());
            $translationTable = $locale_entity->getTable();
            return $model
                ->select($entity->getTable() . '.*')
                ->addSelect($entity->translatedAttributes)
                ->leftJoin(
                    $translationTable, $translationTable . '.' . $entity->getTranslationRelationKey(),
                    '=',
                    $entity->getTable() . '.' . $entity->getKeyName()
                )
                ->where($translationTable . '.' . $entity->getLocaleKey(), app()->getLocale())
                ->where($search_array);
        }

    }
}
