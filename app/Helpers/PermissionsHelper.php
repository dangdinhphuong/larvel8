<?php


namespace App\Helpers;


use App\Repositories\Interfaces\PermissionRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class PermissionsHelper
{

    public static function get()
    {
        if (!Auth::check()){
            return [];
        }

        // Get cache storage
        $cache_storage = config('cache.default');
        $not_allow_cache_tag = ['file', 'dynamodb', 'database '];
        $not_allow_use_tag = in_array($cache_storage, $not_allow_cache_tag);

        if ($not_allow_use_tag) {
            $has_cache = Cache::has('permissions.' . Auth::id());
        } else {
            $has_cache = Cache::tags('permissions')->has(Auth::id());
        }
        if (!$has_cache) {
            $roles = Auth::user()->roles();
            if (is_null($roles)){
                return [];
            }
            $permissions_id = [];
            foreach ($roles as $role) {
                $permissions_id[] = $role->permission_ids;
            }
            $permissions_id = Arr::flatten($permissions_id);
            $permissions_id = array_unique($permissions_id);

            $permission = app(PermissionRepository::class)
                ->findWhereIn('id', $permissions_id)
                ->toArray();
            if (empty($permission)) {
                $filteredRoutes = [];
            } else {
                $filteredRoutes = array_unique(array_merge(
                    ...array_column($permission, 'router')
                ));
            }
            if ($not_allow_use_tag) Cache::add('permissions.' . Auth::id(), $filteredRoutes);
            else Cache::tags('permissions')->add(Auth::id(), $filteredRoutes);
        }
        if ($not_allow_use_tag) return Cache::get('permissions.' . Auth::id());
        return Cache::tags('permissions')->get(Auth::id());
    }

    public static function can($route): bool
    {
        if (config('app.bypass_permission')) {
            return true;
        }
        if (in_array($route, PermissionsHelper::getAllRoutes())) {
            return in_array($route, PermissionsHelper::get());
        }
        return true;
    }

    public static function getAllRoutes()
    {
        $routeCollection = Route::getRoutes();
        $arr = [];
        foreach ($routeCollection as $route) {
            if (in_array('permissions', $route->action['middleware'] ?? [])) {
                $arr[] = $route->action['as'];
            }
        }
        return array_unique($arr);
    }

}
