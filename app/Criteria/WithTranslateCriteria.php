<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class WithTranslateCriteria.
 *
 * @package namespace App\Criteria;
 */
class WithTranslateCriteria implements CriteriaInterface
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
        $locale_entity = app($entity->getTranslationModelName());

        $translationTable = $locale_entity->getTable();
        $localeKey = $entity->getLocaleKey();

//        $model->leftJoin(
//            $locale_entity->getTable(),
//            $locale_entity->getTable() . '.' . $entity->getTranslationRelationKey(),
//            '=',
//            $entity->getTable() . '.' . $entity->getKeyName()
//        );
        $model->addSelect($entity->translatedAttributes, $entity->getTable() . '.*')
            ->leftJoin($translationTable, $translationTable . '.' . $entity->getTranslationRelationKey(), '=', $entity->getTable() . '.' . $entity->getKeyName())
            ->where($translationTable . '.' . $localeKey, 'en');


//        $model->where($locale_entity->getTable() . '.locale', app()->getLocale());
//        $model->addSelect($entity->translatedAttributes);
//        $model->addSelect($entity->getTable() . '.*');

        return $model;
    }
}
