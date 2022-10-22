<?php

namespace App\Presenters;

use App\Transformers\PostTranslationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PostTranslationPresenter.
 *
 * @package namespace App\Presenters;
 */
class PostTranslationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PostTranslationTransformer();
    }
}
