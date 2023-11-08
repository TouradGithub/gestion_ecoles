<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{

    
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            if (Request::is(app()->getLocale() . '/student/dashboard')) {
                return route('selection');
            }
            elseif(Request::is(app()->getLocale() . '/teacher/dashboard')) {
                return route('selection');
            }else {
                return route('selection');
            }
        }
    }
}
