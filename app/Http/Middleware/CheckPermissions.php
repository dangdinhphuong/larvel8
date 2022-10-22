<?php

namespace App\Http\Middleware;

use App\Helpers\PermissionsHelper;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermissions
{


    public function handle($request, Closure $next)
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }
        $route_name = $request->route()->getName();
        $result = PermissionsHelper::can($route_name);
        if ($result) {
            return $next($request);
        }
        return response()->view('auth.message', [
            'message' => 'Bạn không đủ quyền truy cập vào trang này'
        ]);
    }
}
