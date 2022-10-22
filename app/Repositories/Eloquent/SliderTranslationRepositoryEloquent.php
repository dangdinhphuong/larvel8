<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\SliderTranslationRepository;
use App\Entities\SliderTranslation;
use App\Validators\SliderTranslationValidator;

/**
 * Class SliderTranslationRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class SliderTranslationRepositoryEloquent extends BaseRepository implements SliderTranslationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SliderTranslation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
