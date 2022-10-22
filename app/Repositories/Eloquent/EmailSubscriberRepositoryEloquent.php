<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\EmailSubscriberRepository;
use App\Entities\EmailSubscriber;
use App\Validators\EmailSubscriberValidator;

/**
 * Class EmailSubscriberRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class EmailSubscriberRepositoryEloquent extends BaseRepository implements EmailSubscriberRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EmailSubscriber::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
