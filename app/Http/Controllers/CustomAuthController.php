<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

	 public function customRegistration(Request $request)
	 {
		$request->validate([
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:6',
		]);

		$data = $request->all();
		$check = $this->create($data);

		return redirect("dashboard")->withSuccess('You have signed-in');
	 }

	 public function create(array $data)
	 {
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password'])
		]);
	 }

	 public function dashboard()
	 {
		if (Auth::check()) {
			return view('dashboard');
		}else {
			return redirect("login")->withSuccess('You are not allowed to access');
		}
	 }

	 public function signOut()
	 {
		Session::flush();
		Auth::logout();

		return Redirect('login');
	 }
}
