<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


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
            // dd($request->c_admin);

          if($this->contains($uri, 'c_admin_profile'))
                return route('c_admin.login') ;    
          elseif($this->contains($uri, 'd_admin_profile'))
                return route('d_admin.login') ;    
           else
           return url('/login') ;         

        
        //   if(str_contains('$uri', 'd_admin')){
        //   dd($uri);
        //  }
      //    switch ($uri) {

      //   case 'c_admin':
        

      //     case 'd_admin':
      //   return route('d_admin.login')  ;        
        
      //   default:

      //   return url('/login')  ;      
      // }
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
    public function guard($guard){
        return Auth::guard('$guard');
    }

 public static function contains($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
                return true;
            }
        }

        return false;
    }
    
}
