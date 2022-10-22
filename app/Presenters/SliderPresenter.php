<?php

namespace App\Presenters;

use App\Transformers\SliderTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SliderPresenter.
 *
 * @package namespace App\Presenters;
 */
class SliderPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SliderTransformer();
    }
}
