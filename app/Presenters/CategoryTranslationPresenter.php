<?php

namespace App\Presenters;

use App\Transformers\CategoryTranslationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoryTranslationPresenter.
 *
 * @package namespace App\Presenters;
 */
class CategoryTranslationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoryTranslationTransformer();
    }
}
