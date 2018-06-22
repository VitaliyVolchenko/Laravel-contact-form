<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user != null) {
            $roles = $user->roles->pluck('name');

            if ($roles->contains('manager')) {
                return $next($request);
            }

            return redirect('/');
        }

        return redirect()->route('login');
    }
}
