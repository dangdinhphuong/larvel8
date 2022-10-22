<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\PostTranslation;

/**
 * Class PostTranslationTransformer.
 *
 * @package namespace App\Transformers;
 */
class PostTranslationTransformer extends TransformerAbstract
{
    /**
     * Transform the PostTranslation entity.
     *
     * @param \App\Entities\PostTranslation $model
     *
     * @return array
     */
    public function transform(PostTranslation $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
