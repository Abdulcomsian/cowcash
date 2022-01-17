<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Illuminate\Support\Facades\Cookie;
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

        if (isset($_GET['lang'])) {
            App::setLocale($_GET['lang']);
        } else {
            App::setLocale('en');
        }
        return $next($request);
    }
}
