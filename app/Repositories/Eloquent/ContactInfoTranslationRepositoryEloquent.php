<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\ContactInfoTranslationRepository;
use App\Entities\ContactInfoTranslation;
use App\Validators\ContactInfoTranslationValidator;

/**
 * Class ContactInfoTranslationRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ContactInfoTranslationRepositoryEloquent extends BaseRepository implements ContactInfoTranslationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ContactInfoTranslation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
