<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        
        switch ($guard) {

        case 'c_admin':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('c_admin.dashboard');
          }
          break;

          case 'd_admin':
            if (Auth::guard($guard)->check()) {
            return redirect()->route('d_admin.dashboard');
          }
          break;
        default:
          if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
          break;
      }

        return $next($request);
    }
}
