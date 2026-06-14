<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/login');
        }

        $user = Auth::user();

        if (!$user) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/login');
        }

        if ($user->role == 'admin') {
            return view('admin.profile', compact('user'));
        }

        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate(

            [
                'username' => 'required|string|max:255',
                'gender' => 'required',
            ],

            [
                'username.required' => 'Username wajib diisi.',
                'gender.required' => 'Gender wajib dipilih.',
            ]

        );

        $user->username = $request->username;
        $user->gender = $request->gender;

        // PASSWORD OPSIONAL
        if ($request->filled('password')) {

            $user->password = Hash::make(
                $request->password
            );
        }

        /** @var User $user */
        $user->save();

        return back()->with(
            'success',
            'Profile berhasil diperbarui.'
        );
    }
}
