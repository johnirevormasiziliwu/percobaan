<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function authenticate(Request $request) {
        $valideData = $request->validate([
           'email' => ['required', 'email:dns'],
           'password' => ['required'],
        ]);

        if(Auth::attempt($valideData)){
            $request->session()->regenerate();
            
            return redirect(route('list_product'));
        }

        $request->session()->flash('loginError', 'Login failed !!  check email and password');
        
        return redirect(route('login'));
        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        $request->session()->flash('logout', 'Horeeeee Logout Successfully!!');
        
        return redirect(route('login'));
    }
    
}