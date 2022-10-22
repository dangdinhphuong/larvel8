<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\CategoryTranslation;

/**
 * Class CategoryTranslationTransformer.
 *
 * @package namespace App\Transformers;
 */
class CategoryTranslationTransformer extends TransformerAbstract
{
    /**
     * Transform the CategoryTranslation entity.
     *
     * @param \App\Entities\CategoryTranslation $model
     *
     * @return array
     */
    public function transform(CategoryTranslation $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
