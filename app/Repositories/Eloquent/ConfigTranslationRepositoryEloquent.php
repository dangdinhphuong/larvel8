<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\ConfigTranslationRepository;
use App\Entities\ConfigTranslation;
use App\Validators\ConfigTranslationValidator;

/**
 * Class ConfigTranslationRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ConfigTranslationRepositoryEloquent extends BaseRepository implements ConfigTranslationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ConfigTranslation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
