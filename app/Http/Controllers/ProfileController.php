<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'name' => 'required',
            'gender' => 'nullable'
        ]);

        $user->update([
            'name' => $request->name,
            'gender' => $request->gender,
        ]);

        return back()->with('success', 'Profile berhasil diperbarui');
    }
}
