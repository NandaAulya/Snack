<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
            return redirect()->intended(Auth::user()->role === 'admin' ? '/Nadmn' : route('home'));
        }

        // throw ValidationException::withMessages([
        //     'email' => 'email atau pasword salah',
        // ]);

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
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
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'full_name' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:6',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'full_name' => $request->full_name,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('user'));
    }

    // public function update(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->update(['role' => $request->role]);

    //     return redirect()->back()->with('success', 'Role pengguna berhasil diperbarui!');
    // }

    public function update(Request $request, $id)
{
    $request->validate([
        'role' => 'required|in:admin,client',
    ]);

    $user = User::findOrFail($id);
    $user->update(['role' => $request->role]);

    return redirect()->back()->with('success', 'Role pengguna berhasil diperbarui!');
}

    // public function destroy($id)
    // {
    //     User::findOrFail($id)->delete();
    //     return redirect()->back()->with('success', 'Pengguna berhasil dihapus!');
    // }

    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->back()->with('success', 'Pengguna berhasil dihapus!');
}

    // public function index()
    // {
    //     $title = 'Admin';
    //     return view('admin', compact('title'));
    // }

    // public function manageSnacks()
    // {
    //     $title = 'Kelola Snack';
    //     return view('admin.snacks', compact('title'));
    // }

    // public function manageDrinks()
    // {
    //     $title = 'Kelola Drink';
    //     return view('admin.drinks', compact('title'));
    // }

    // public function manageUsers()
    // {
    //     $title = 'Kelola Pengguna';
    //     $users = User::all();
    //     return view('admin.user', compact('title', 'users'));
    // }

    // public function viewAllUsers()
    // {
    //     $users = User::all();
    //     return view('admin.user', compact('users'));
    // }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'id_user' => 'required|exists:users,id',
    //         'role' => 'required|in:admin,client',
    //     ]);

    //     $user = User::find($request->id_user);
    //     $user->role = $request->role;
    //     $user->save();

    //     return redirect()->route('users.index')->with('success', 'Data pengguna berhasil diperbarui.');
    // }

    // public function destroy(Request $request)
    // {
    //     $request->validate([
    //         'id_user' => 'required|exists:users,id',
    //     ]);

    //     $user = User::find($request->id_user);
    //     $user->delete();

    //     return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    // }

}
