<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ContactInfoTranslation;

/**
 * Class ContactInfoTranslationTransformer.
 *
 * @package namespace App\Transformers;
 */
class ContactInfoTranslationTransformer extends TransformerAbstract
{
    /**
     * Transform the ContactInfoTranslation entity.
     *
     * @param \App\Entities\ContactInfoTranslation $model
     *
     * @return array
     */
    public function transform(ContactInfoTranslation $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
