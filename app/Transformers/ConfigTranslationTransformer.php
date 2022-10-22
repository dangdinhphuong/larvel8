<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ConfigTranslation;

/**
 * Class ConfigTranslationTransformer.
 *
 * @package namespace App\Transformers;
 */
class ConfigTranslationTransformer extends TransformerAbstract
{
    /**
     * Transform the ConfigTranslation entity.
     *
     * @param \App\Entities\ConfigTranslation $model
     *
     * @return array
     */
    public function transform(ConfigTranslation $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
