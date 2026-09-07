<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please sign in to access the administrator portal.');
        }

        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized. Administrator credentials required.');
        }

        return $next($request);
    }
}
