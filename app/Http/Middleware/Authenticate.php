<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Str;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    { 
           $uri=$request->route()->uri;
          
        //   if(str_contains('$uri', 'd_admin')){
        //   dd($uri);
        //  }
         switch ($uri) {

        case 'c_admin':
        return route('c_admin.login') ;         
        

          case 'd_admin':
        return route('d_admin.login')  ;        
        
        default:

        return url('/login')  ;      
      }
        // dd(_>str_contains('d_admin'));
        //         if (! $request->expectsJson()) {
        //     dd($guard);
        // }
            // switch($request->route()->uri->has('x')){
            //     case 'c_admin':
            //  return route('c-admin.login');
            // }
            //  }
    }


    
}
