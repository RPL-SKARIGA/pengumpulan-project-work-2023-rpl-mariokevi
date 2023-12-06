<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('admin/login');
    }

    public function loginproses(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            // dd('Login successful'); // Add this line for debugging
            return redirect('/');
        } else {
            // dd('Login failed'); // Add this line for debugging
            return redirect('/login');
        }
        // dd($request->all());
    }

    public function register()
    {
        return view('admin/register');
    }

    public function registeruser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return \redirect('login');
    }
}
