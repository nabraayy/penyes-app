<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function authenticated(Request $request,$user){
        if($user->role ===1){
            return redirect('/Tareas/penyes-app/resources/views/admin/dashboard.blade.php');
        } elseif($user->role === 2){
            return redirect('/Tareas/penyes-app/resources/views/user/dashboard.blade.php');
        }
        return redirect('/Tareas/penyes-app/resources/views/dashboard.blade.php');
    }
}
