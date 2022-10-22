<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function __invoke(Request $request)
    {
        $locale = $request->get('locale', 'en');
        Session::put('locale', $locale);
        app()->setLocale($locale);
        return back()->with([

        ]);
    }
}
