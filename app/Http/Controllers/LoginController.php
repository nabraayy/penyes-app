<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    use authenticated;
    protected function authenticated(Request $request,$user){
        if($user->role ===1){
            return redirect('admin/dashboard.blade.php');
        } elseif($user->role === 2){
            return redirect('user/dashboard.blade.php');
        }
        return redirect('views/dashboard.blade.php');
    }

        public function redirectTo()
        {
            $user = Auth::user();

            if ($user->role == 1) {
                return redirect('/admin-dashboard');
            }

            if ($user->role == 2) {
                return redirect('/user-dashboard');
            }

            return redirect('/default-page');
        }

}
