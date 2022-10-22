<?php

namespace App\Listeners;

use App\Events\UpdateUserDataProcess;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ClearCachePermissions
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\UpdateUserDataProcess $event
     * @return void
     */
    public function handle(UpdateUserDataProcess $event)
    {
        $cache_storage = config('cache.default');
        $not_allow_cache_tag = ['file', 'dynamodb', 'database '];
        $not_allow_use_tag = in_array($cache_storage, $not_allow_cache_tag);

        if ($not_allow_use_tag) {
            Cache::delete('permissions.' . $event->user_id);
        } else {
            Cache::tags('permissions')->delete($event->user_id);
        }
    }
}
