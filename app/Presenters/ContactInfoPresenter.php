<?php

namespace App\Presenters;

use App\Transformers\ContactInfoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ContactInfoPresenter.
 *
 * @package namespace App\Presenters;
 */
class ContactInfoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContactInfoTransformer();
    }
}
