<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ConfigRepository.
 *
 * @package namespace App\Repositories\Interfaces;
 */
interface ConfigRepository extends RepositoryInterface
{
    public function queryWithTranslate();

}
