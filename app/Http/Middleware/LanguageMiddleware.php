<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;
use Illuminate\Http\Request;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Make sure current locale exists.
        if (isset($_GET['lang'])) {
            $locale = $_GET['lang'];
        } elseif (Session::has('lang')) {
            $locale = Session::get('lang');
        } else {
            $locale = 'en';
        }
        Session::put('lang', $locale);
        App::setLocale($locale);
        return $next($request);
    }
}
