<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // TAMPILKAN HALAMAN LOGIN
    public function showLogin()
    {
        return view('auth.login');
    }

    // TAMPILKAN HALAMAN REGISTER
    public function showRegister()
    {
        return view('auth.register');
    }

    // PROSES REGISTER
    public function register(Request $request)
    {
        $validated = $request->validate([
            'school_id' => 'required|unique:users|regex:/^\d{9}$/',
            'name' => 'required',
            'class' => 'required',
            'major' => 'required',
            'username' => 'required|unique:users|min:8',
            'password' => 'required|min:8|confirmed',
        ]);

        $validated['email'] = $validated['school_id'] . '@student.smktelkom-jkt.sch.id';
        $validated['name'] = strtoupper($validated['name']);
        $validated['class'] = strtoupper($validated['class']);
        $validated['major'] = strtoupper($validated['major']);
        $validated['username'] = strtolower($validated['username']);
        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'member';

        User::create($validated);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('books.index');
            }

            return redirect()->route('books.index');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}