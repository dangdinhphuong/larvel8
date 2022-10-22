<?php

namespace App\Helpers;

use Cache;

class ConfigHelpers
{
    public static function get($key)
    {
        $cache_key = 'config.' . app()->getLocale();

        $data = Cache::get($cache_key);
        if (isset($data[$key])) {
            return $data[$key];
        }
        if (config('app.debug')) {
            return 'config.' . $key;
        }
        return '';
    }
}
