<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostRepository.
 *
 * @package namespace App\Repositories\Interfaces;
 */
interface PostRepository extends RepositoryInterface
{
    public function queryWithTranslate();

    public function getRelatedPost($id, $type, $limit = 4);
}
