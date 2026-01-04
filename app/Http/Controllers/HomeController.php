<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Promosi;
use App\Models\Testimoni;

class HomeController extends Controller
{
    
    public function index()
    {
        $recomend = Produk::whereIn('id', [3, 25, 14, 8,])->latest()->get();
        $testimoni = Testimoni::with('user')->where('status', 'disetujui')->latest()->get();
        $total_produk = Produk::count();
        $total_kategori = Kategori::count();
        $promosi = Promosi::where('status', 'aktif')->latest()->get();

        return view('pengunjung.index', compact('promosi', 'recomend', 'testimoni', 'total_produk', 'total_kategori'));
    }

    public function about()
    {
        $total_produk = Produk::count();
        $total_kategori = Kategori::count();
        return view('pengunjung.about', compact('total_produk', 'total_kategori'));
    }

    public function menu(Request $request)
    {
        $query = $request->input('keywords');
        $kategori = Kategori::all(); 

        $syarat_produk = Produk::with('kategori')
            ->where('status', 'tersedia')
            ->where('stok', '>', 0);

        if ($query) {
            $syarat_produk->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama_produk', 'LIKE', '%' . $query . '%')
                        ->orWhere('harga', 'LIKE', '%' . $query . '%') 
                        ->orWhereHas('kategori', function ($keywords) use ($query) {
                            $keywords->where('nama_kategori', 'LIKE', '%' . $query . '%');
                        });
            });
        }

        $produk = $syarat_produk->latest()->get();

        return view('pengunjung.menu', compact('kategori', 'produk', 'query'));
    }


    public function contact()
    {
        return view('pengunjung.contact');
    }    

    // ============================================

    public function profil_view()
    {
        return view('page.profil.index');
    }


    public function update_profil(Request $request, $id)
    {
        $request->validate([
            'nama_user'=> 'required',
            'no_hp'=> 'required',
            'alamat'=> 'required',
        ]);

        $user = User::findOrFail( $id );
        $user->nama_user = $request->input('nama_user');
        $user->email = $request->input('email');
        $user->no_hp = $request->input('no_hp');
        $user->alamat = $request->input('alamat');

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move('image/user', $nama_file);

            $user->foto_profil = $nama_file;
        }
        $user->save();
        return redirect('/dashboard')->with('success','Data Berhasil Diubah');
    }

    public function ubah_password_view()
    {
        return view('page.profil.ubah_password');
    }

    public function ubah_password(Request $request, $id)
    {
        $request->validate([
            'pw_lama'=> 'required|min:5',
            'pw_new'=> 'required|min:5',
        ]);

        $user = User::findOrFail( $id );
        $ubahPasswordIsValid = Hash::check($request->input('pw_lama'), $user->password);

        if( $ubahPasswordIsValid ) {
            $user->password = Hash::make($request->input('pw_new'));
            $user->save();

            return back()->with('success','Passowrd berhasil diubah');
        }

        return back()->with('error','Password gagal diubahe');
    }
}
