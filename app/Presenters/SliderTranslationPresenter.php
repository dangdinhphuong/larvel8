<?php

namespace App\Presenters;

use App\Transformers\SliderTranslationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SliderTranslationPresenter.
 *
 * @package namespace App\Presenters;
 */
class SliderTranslationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SliderTranslationTransformer();
    }
}
