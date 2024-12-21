<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleAutentication()
{
    $googleUser = Socialite::driver('google')->user();
    // dd($googleUser);
    // Mencari user berdasarkan google_id
    $user = User::where('google_id', $googleUser->id)->first();
    
    if ($user) {
        Auth::login($user);
        return redirect('/');
    } else {
        // Jika user tidak ditemukan, redirect atau buat user baru (opsional)
        return redirect()->route('login')->with('error', 'User tidak ditemukan.');
    }
}

}
