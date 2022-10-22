<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logout()
    {
        $cache_storage = config('cache.default');
        $not_allow_cache_tag = ['file', 'dynamodb', 'database '];
        $not_allow_use_tag = in_array($cache_storage, $not_allow_cache_tag);

        if ($not_allow_use_tag) {
            Cache::forget('permissions.' . Auth::id());
        } else {
            Cache::tags('permissions')->forget(Auth::id());
        }

        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
}
