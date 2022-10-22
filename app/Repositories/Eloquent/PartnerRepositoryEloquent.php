<?php

namespace App\Repositories\Eloquent;

use App\Entities\Partner;
use App\Repositories\Interfaces\PartnerRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PartnerRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class PartnerRepositoryEloquent extends BaseRepository implements PartnerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Partner::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
