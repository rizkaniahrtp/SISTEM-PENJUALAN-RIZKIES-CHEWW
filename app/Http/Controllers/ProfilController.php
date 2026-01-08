<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pengunjung.profil', compact('user'));        
    }   

    public function edit()
    {
        return view('pengunjung.password');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'nama_user'=> 'required',
            'no_hp' => 'required',
            'alamat'=> 'required',
            'foto_profil'=> 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->nama_user = $request->nama_user;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;

        if ($request->hasFile('foto_profil')) 
        {
            $file = $request->file('foto_profil');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move('image/user', $nama_file);
            $user->foto_profil = $nama_file;
        }

        $user->save(); 
        return back()->with('success','Profil berhasil diperbarui');
    }
    
    public function update_pw(Request $request)
    {
        $request->validate([
            'pw_old' => 'required',
            'pw_new'=> 'required|min:5|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->pw_old, $user->password)) {
            return back()->with('error','Terdapat kesalahan, periksa password anda!');
        }   

        $user->password = Hash::make($request->pw_new);
        $user->save();
        return back()->with('success','Password berhasil diubah');
    }
    
}
