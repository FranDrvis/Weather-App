<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserGroup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $group): Response
    {
        $user = $request->user();
        //dd($user->group->name, $group);
        // Ensure the user is authenticated and belongs to the specified group
        if ($user && strtolower($user->group->name) === strtolower($group)) {
            return $next($request);
        }

        abort(403, 'Unauthorized.');
    }
}
