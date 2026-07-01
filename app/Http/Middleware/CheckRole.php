<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
  

    public function showLogin()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {

            $request->session()->regenerate();

            if (Auth::user()->role == 'user') {
                return redirect()->route('home')
                    ->with('success', 'Login berhasil.');
            }

            Auth::logout();

            return back()->withErrors([
                'email' => 'Akun ini bukan User.'
            ]);
        }

        return back()->withErrors([
            'email' => 'Email atau Password salah.'
        ]);
    }


    public function showRegister()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('user.login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }

  

    public function showForgotPassword()
    {
        return view('user.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan.'
            ]);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.login')
            ->with('success', 'Password berhasil diubah. Silakan login kembali.');
    }

   

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}