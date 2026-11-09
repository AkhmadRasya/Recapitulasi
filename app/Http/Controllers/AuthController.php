<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if ($user) {
            $isPasswordValid = false;

            // Check bcrypt
            if (Hash::check($credentials['password'], $user->password)) {
                $isPasswordValid = true;
            } elseif ($user->password === $credentials['password']) {
                // If legacy plain-text, upgrade to bcrypt
                $user->password = Hash::make($credentials['password']);
                $user->save();
                $isPasswordValid = true;
            }

            if ($isPasswordValid) {
                Auth::login($user, $request->boolean('remember'));
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'))
                    ->with('success', 'Selamat datang kembali, ' . $user->nama_lengkap);
            }
        }

        return back()->withErrors([
            'username' => 'Username atau kata sandi tidak cocok dengan data kami.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Anda telah berhasil keluar.');
    }
}

