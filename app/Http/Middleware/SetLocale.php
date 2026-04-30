<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        // Allow locale override via query param for preview purposes
        if ($request->has('preview_locale') && in_array($request->get('preview_locale'), ['id', 'en'])) {
            App::setLocale($request->get('preview_locale'));
        } elseif (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
            App::setLocale('id');
            Session::put('locale', 'id');
        }

        return $next($request);
    }
}
