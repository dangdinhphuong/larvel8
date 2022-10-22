<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ContactInfo;

/**
 * Class ContactInfoTransformer.
 *
 * @package namespace App\Transformers;
 */
class ContactInfoTransformer extends TransformerAbstract
{
    /**
     * Transform the ContactInfo entity.
     *
     * @param \App\Entities\ContactInfo $model
     *
     * @return array
     */
    public function transform(ContactInfo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
