<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{

      public function showLoginForm()
    {
        // Ini untuk menampilkan form login, yang berada didalam folder bernama auth
        return view('auth.login');
    }




    public function login(Request $request)
    {
        // Credensial untuk form login, yang diminta hanya email dan password saja
        // Apabila berhasil login akan langsung masuk ke dashboard My Social Media
        // Apabila gagal akan dikembalikan ke halaman Login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Alert::success('Login Berhasil', 'Selamat Datang di My Social Media');
            return redirect()->route('profile.index');
        }
        Alert::error('Error', 'Tolong Periksa Kembali Email dan Password Anda');
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegisterForm()
    {

        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Ini sebagai penangan dari form register, yang dibutuhkan untuk register adalah inputan nama, email, dan password
        // Apabila User Berhasil Mendaftar akan diarahkan ke halaman login
        $users = User::create([

            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Alert::success('Yeaaayy', 'Akunmu Berhasil Dibuat');
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
    public function logout()
    {
        // untuk menjalankan fungsi logout, apabila user menekan tombol logout akan keluar dari dashboard dan diarahkan ke halaman login
        Auth::logout();
        Alert::warning('See You Again', 'We Hope You Back Again, Thanks');
        return redirect()->route('login');
    }
}
