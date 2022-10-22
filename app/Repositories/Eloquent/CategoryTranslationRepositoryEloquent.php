<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\CategoryTranslationRepository;
use App\Entities\CategoryTranslation;
use App\Validators\CategoryTranslationValidator;

/**
 * Class CategoryTranslationRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class CategoryTranslationRepositoryEloquent extends BaseRepository implements CategoryTranslationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoryTranslation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
