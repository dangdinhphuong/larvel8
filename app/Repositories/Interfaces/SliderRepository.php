<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SliderRepository.
 *
 * @package namespace App\Repositories\Interfaces;
 */
interface SliderRepository extends RepositoryInterface
{
    public function queryWithTranslate();
}
