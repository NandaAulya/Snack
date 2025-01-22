<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(Auth::user()->role === 'admin' ? '/admin' : route('home'));
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->withInput();
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('home')->with('message', 'Anda telah berhasil logout.');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'full_name' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:6',
        ]);
    
        // Buat user baru
        User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'full_name' => $validatedData['full_name'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        // Redirect ke halaman login
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
    

    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

}
