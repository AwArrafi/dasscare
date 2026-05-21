<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([

            'name' => ['required'],

            'email' => ['required', 'email', 'unique:users'],

            'password' => ['required', 'confirmed', 'min:8'],

            'username' => ['required', 'unique:users', 'max:255'],

            'gender' => ['required'],

            'job' => ['required'],

            'city' => ['required'],

            'phone' => ['required', 'min:10'],

        ]);

        $user = User::create([

            'name' => $validated['name'],

            'email' => $validated['email'],

            'password' => Hash::make($validated['password']),

            'username' => $validated['username'],

            'gender' => $validated['gender'],

            'job' => $validated['job'],

            'city' => $validated['city'],

            'phone' => $validated['phone'],

            'role' => 'user',

        ]);

        return redirect('/login')
            ->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([

            'email' => ['required'],
            'password' => ['required']

        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // CEK ROLE
            if (Auth::user()->role == 'admin') {

                return redirect('/admin');
            }

            // USER BIASA
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
