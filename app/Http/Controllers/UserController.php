<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
        return view('user.dashboard');
    }
    protected function authenticated(Request $request,$user){
        if($user->isAdmin()){
            return redirect('/Tareas/penyes-app/resources/views/admin/dashboard.blade.php');
        } elseif($user->isUser){
            return redirect('/Tareas/penyes-app/resources/views/user/dashboard.blade.php');
        }
        return redirect('/Tareas/penyes-app/resources/views/dashboard.blade.php');
    }
}

