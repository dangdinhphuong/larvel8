<?php

namespace App\Http\Middleware;

use App\Helpers\ConfigHelpers;
use App\Repositories\Interfaces\ConfigRepository;
use Cache;
use Closure;
use Illuminate\Http\Request;

class Config
{
    public $repository;

    public function __construct(ConfigRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $cache_key = 'config.' . app()->getLocale();
        if (!Cache::has($cache_key)) {
            $configs = $this->repository
                ->findWhere([
                    'status' => 1
                ]);
            $config_array = [];
            foreach ($configs as $config) {
                $config_array[$config->key] = $config->value;
            }
            Cache::set($cache_key, $config_array);
        }
        return $next($request);
    }
}
