<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson() && !auth()->check()) {
            if ($request->is('staff/*')) {
                return route('staff.login'); // Redirect staff users to the staff login route.
            } else
                return route('reader.login'); // Redirect reader users to the reader login route.
        }
    }
}
