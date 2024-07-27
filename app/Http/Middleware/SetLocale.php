<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
//        if (Session::has('locale')) {
//            $locale = Session::get('locale');
//        } else {
//            $locale = $request->getPreferredLanguage(Config::get('app.supported_locales'));
//            Session::put('locale', $locale);
//        }
//
//        App::setLocale($locale);
//
//        return $next($request);


        if (Session::get("locale") != null) {
            App::setLocale(Session::get("locale"));
        } else {
            Session::put("locale", getConfigLang());
            App::setLocale(Session::get("locale"));
        }
        LaravelLocalization::setLocale(Session::get("locale"));
        return $next($request);
    }
}
