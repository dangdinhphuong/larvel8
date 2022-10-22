<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ContactInfoRepository.
 *
 * @package namespace App\Repositories\Interfaces;
 */
interface ContactInfoRepository extends RepositoryInterface
{
    public function queryWithTranslate();
}
