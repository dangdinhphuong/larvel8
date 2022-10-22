<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\SliderTranslation;

/**
 * Class SliderTranslationTransformer.
 *
 * @package namespace App\Transformers;
 */
class SliderTranslationTransformer extends TransformerAbstract
{
    /**
     * Transform the SliderTranslation entity.
     *
     * @param \App\Entities\SliderTranslation $model
     *
     * @return array
     */
    public function transform(SliderTranslation $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
