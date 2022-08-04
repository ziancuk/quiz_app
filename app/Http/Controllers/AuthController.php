<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function getLogin()
    {
        return view('auth.login');
    }


    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/dashboard');
        }
        return redirect()->back()->with('error', 'Username/Password tidak sesuai');
    }

    public function postRegister(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|min:7|unique:users',
                'name' => 'required',
                'password' => 'required|min:3|confirmed',
            ],
            [
                'required' => 'Form Tidak Boleh Kosong!',
                'password.min' => 'Kata Sandi Minimal 3 Karakter',
                'confirmed' => 'Password tidak sama',
                'unique' => 'Email sudah pernah digunakan. Silahkan ganti Email.'
            ]
        );
        User::create([
            'email' => $request->email,
            'name' => ucfirst($request->name),
            'role' => 1,
            'password' => bcrypt($request->password)
        ]);
        return redirect('/')->with('status', 'Registrasi berhasil. Silahkan Login.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
