<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Partner;

/**
 * Class PartnerTransformer.
 *
 * @package namespace App\Transformers;
 */
class PartnerTransformer extends TransformerAbstract
{
    /**
     * Transform the Partner entity.
     *
     * @param \App\Entities\Partner $model
     *
     * @return array
     */
    public function transform(Partner $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
