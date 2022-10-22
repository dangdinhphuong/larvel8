<?php

namespace App\Presenters;

use App\Transformers\ContactInfoTranslationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ContactInfoTranslationPresenter.
 *
 * @package namespace App\Presenters;
 */
class ContactInfoTranslationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContactInfoTranslationTransformer();
    }
}
