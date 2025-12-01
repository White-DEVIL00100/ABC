<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);
        $supported = ['en', 'ar'];

        if (in_array($locale, $supported)) {
            app()->setLocale($locale);
            session(['locale' => $locale]);
        } elseif (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }

        return $next($request);
    }

}
