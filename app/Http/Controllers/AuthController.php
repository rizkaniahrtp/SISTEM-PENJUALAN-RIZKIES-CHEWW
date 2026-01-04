<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerView()
    {
        if(Auth::check()){
            return redirect('/');
        }

        return view("page.register");
    }

    public function register(Request $request)
    {
        if(Auth::check()){
            return back();
        }
        
        $request->validate([
            'nama_user' => 'required|max:255',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:5|confirmed',
        ]);

        User::create([
            'nama_user'=> $request->nama_user,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'peran'=>'pengunjung',
            'no_hp' => null,
            'foto_profil' => null,
            'alamat' => null,
        ]);

        return redirect('/register')->with('success', 'Registrasi berhasil! Silakan Login.');
    }

    public function login(Request $request)
    {
        if(Auth::check()){
            return back();
        }
        return view('page.login');
    }

    public function authenticate(Request $request)
    {
        if(Auth::check()){
            return back();
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required'=> 'Email harus diisi',
            'email.email'=> 'Email tidak valid',
            'password.required' => 'Password harus diisi',
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); 
            
            $user = Auth::user();

            if($user->peran !== 'pengunjung'){
                return redirect()->intended('dashboard');
            }
            return redirect()->route('home');

        } 

        return back()->withErrors([
            'email'=> 'Terjadi kesalahan, periksa kembali email atau password anda'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
