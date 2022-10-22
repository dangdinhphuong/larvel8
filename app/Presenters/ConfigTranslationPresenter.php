<?php

namespace App\Presenters;

use App\Transformers\ConfigTranslationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConfigTranslationPresenter.
 *
 * @package namespace App\Presenters;
 */
class ConfigTranslationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ConfigTranslationTransformer();
    }
}
