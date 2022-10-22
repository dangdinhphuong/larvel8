<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\EmailSubscriber;

/**
 * Class EmailSubscriberTransformer.
 *
 * @package namespace App\Transformers;
 */
class EmailSubscriberTransformer extends TransformerAbstract
{
    /**
     * Transform the EmailSubscriber entity.
     *
     * @param \App\Entities\EmailSubscriber $model
     *
     * @return array
     */
    public function transform(EmailSubscriber $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
