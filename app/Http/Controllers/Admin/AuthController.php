<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login',[
            'title' => 'Login User'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username'  => 'required',
            'password'  => 'required'
           
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            
            return redirect()->intended();

        }

        return back()->with('errorLogin',"Login Failed!");
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
