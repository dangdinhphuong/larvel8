<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Slider;

/**
 * Class SliderTransformer.
 *
 * @package namespace App\Transformers;
 */
class SliderTransformer extends TransformerAbstract
{
    /**
     * Transform the Slider entity.
     *
     * @param \App\Entities\Slider $model
     *
     * @return array
     */
    public function transform(Slider $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
