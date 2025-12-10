<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // pastikan login.blade.php ada di resources/views/
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return back()->withErrors(['username' => 'Username tidak ditemukan']);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah']);
        }

        Auth::login($user);

        return redirect('/perpus');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
