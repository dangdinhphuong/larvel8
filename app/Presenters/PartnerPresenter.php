<?php

namespace App\Presenters;

use App\Transformers\PartnerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PartnerPresenter.
 *
 * @package namespace App\Presenters;
 */
class PartnerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PartnerTransformer();
    }
}
