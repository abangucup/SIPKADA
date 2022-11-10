<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            $user = auth()->user()->role;
            if ($user == 'admin') {
                return redirect()->route('dashboard');
            }
            return redirect()->route('umum');
        }

        return back()->with('status', 'Username atau Password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();
        
        return redirect('/');
        
    }
}
