<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request,Closure $next,$role){
        if(Auth::check()){
            $user = Auth::user();
            if($role ==='admin' && $user->role_id !=1){
                return redirect('/user');
            } elseif($role === 'user' && $user->role_id !=2){
                return redirect('/admin');
            }
        }
        return $next($request);
    }

}