<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login.register');
    }

    public function CustomLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {
            return redirect()->intended('dashboard')
            ->withSuccess('Signed in');
        }else {
            return redirect("login")->withSuccess('Login details are not valid');
        }
    }

	 public function Registration()
	 {
		return view('auth.login.register');
	 }
}
