<?php

namespace App\Presenters;

use App\Transformers\EmailSubscriberTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EmailSubscriberPresenter.
 *
 * @package namespace App\Presenters;
 */
class EmailSubscriberPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EmailSubscriberTransformer();
    }
}
