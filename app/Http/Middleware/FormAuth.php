<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class FormAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $roleKey=[];
        $roleController=explode('|', $role);
        foreach (Auth::user()->role as $item) {
            array_push($roleKey,$item->role);
        } 

        $compare= array_intersect($roleController,$roleKey);  
        if(sizeof($compare)<1)
        {            
            return redirect('home');
        }       
        return $next($request);
    }
}
