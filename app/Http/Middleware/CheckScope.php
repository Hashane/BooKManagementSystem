<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

/** 
 * Created a custom middleware to check the scopes assigned to a token.
 * 
 * Also throws a custom message when scope doesn't match
 */
class CheckScope extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$guards
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $scope = $guards[0] ?? null; // Retrieve the first guard as the scope

        if (!$request->user() || !$request->user()->token() || !$request->user()->tokenCan($scope)) {
            return response()->json(['error' => 'Unauthorized. Scope does not match.'], 403);
        }

        return $next($request);
    }
}
