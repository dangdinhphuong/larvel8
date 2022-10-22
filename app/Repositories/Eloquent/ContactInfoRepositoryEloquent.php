<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\ContactInfoRepository;
use App\Entities\ContactInfo;

/**
 * Class ContactInfoRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ContactInfoRepositoryEloquent extends BaseRepository implements ContactInfoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ContactInfo::class;
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
            'contact_info_translations',
            'contact_info_translations.contact_info_id',
            '=',
            'contact_infos.id'
        )->where('contact_info_translations.locale', app()->getLocale())->select(
            'contact_infos.*',
            'contact_info_translations.name',
            'contact_info_translations.address',
            'contact_info_translations.email',
            'contact_info_translations.phone',
        );
    }

}
