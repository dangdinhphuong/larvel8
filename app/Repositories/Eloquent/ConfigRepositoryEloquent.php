<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\ConfigRepository;
use App\Entities\Config;
use App\Validators\ConfigValidator;

/**
 * Class ConfigRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ConfigRepositoryEloquent extends BaseRepository implements ConfigRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Config::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function queryWithTranslate()
    {
        return $this->leftJoin(
            'config_translations',
            'config_translations.config_id',
            '=',
            'configs.id'
        )->where('config_translations.locale', app()->getLocale())
            ->select(
                'configs.*',
                'config_translations.value',
            );
    }
}
