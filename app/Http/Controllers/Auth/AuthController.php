<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            //return $this->redirectTo();
            if(Auth::check()){
                $user = Auth::user();
                if($user->role_id == Role::ADMIN){
                    return redirect('/admin');
                }
                if($user->role_id == Role::USER){
                    return redirect('/user');
                }
            }
        }
        return back()->withErrors([
            'email' =>'The provided credentials do match our records.',
        ]);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function redirect(){
        $user =Auth::user();

        if($user->role_id == 1){
            return redirect('/admin');
        } elseif ($user->role_id == 2){
            return redirect('/user');
        }
        return redirect('/');
    }
}
