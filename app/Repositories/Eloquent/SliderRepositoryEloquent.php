<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\SliderRepository;
use App\Entities\Slider;
use App\Validators\SliderValidator;

/**
 * Class SliderRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class SliderRepositoryEloquent extends BaseRepository implements SliderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Slider::class;
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
            'slider_translations',
            'slider_translations.slider_id',
            '=',
            'sliders.id'
        )->where('slider_translations.locale', app()->getLocale())
            ->select(
                'sliders.*',
                'slider_translations.thumbnail',
                'slider_translations.content'
            );
    }
}
