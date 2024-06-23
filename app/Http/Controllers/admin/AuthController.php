<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('administrator.auth.login');
    }

    public function process(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, alihkan ke halaman yang sesuai
            return redirect()->route('admin.dashboard')->with('success', 'Loged In');
        }

        // Jika autentikasi gagal, alihkan kembali ke halaman masuk dengan pesan error
        return redirect()->route('admin.auth.login')->with('error', 'Wrong email or password.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.auth.login')->with('warning', 'Has been Logout.'); // Ganti 'login' dengan rute halaman masuk yang sesuai
    }
}
