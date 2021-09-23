<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;
use Helper;

class CheckPermision
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        // check user is login or not
        if(Auth::check() == false){
            return redirect('/login');
        }

        $role_name = Helper::show_role_name();
        if($role_name == 'superadmin'){
            return $next($request);    
        }else if( $role_name == 'admin' ){
            return $next($request);
        }else{
            return $next($request);

            // $list = Helper::get_permission_list();
            // if(in_array('', $list)){
            //     return $next($request);
            // }else
            //     return redirect('/');

        }
        
    }
}
