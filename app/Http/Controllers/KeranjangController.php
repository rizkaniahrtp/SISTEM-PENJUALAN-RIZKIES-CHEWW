<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keranjang = Keranjang::with('produk')->where('user_id', Auth::id())->get();
        $total_harga = $keranjang->sum(function ($produk){
            return $produk->produk->harga * $produk->jumlah;
        });

        return view('pengunjung.keranjang.index', compact('keranjang', 'total_harga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah($id)
    {
        if(!Auth()->check()){
            return redirect('/login')->with('info','Silahkan login terlebih dahulu');
        }

        $user = Auth::id();
        $periksa_keranjang = Keranjang::where('user_id', $user)->where('produk_id', $id)->first();
        if($periksa_keranjang){
            $periksa_keranjang->increment('jumlah');
        } else{
            Keranjang::create([
                'user_id' => $user,
                'produk_id' => $id,
                'jumlah' => 1
            ]);
        }
        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $aksi)
    {
        $produk = Keranjang::where('id', $id)->where('user_id', Auth::id())->first();

        if ($produk) {
            if ($aksi == 'tambah') 
            {
                if ($produk->jumlah < $produk->produk->stok) {
                    $produk->jumlah += 1;
                } else {
                    return back()->with('error', 'Stok produk tidak mencukupi!');
                }
            } 

            elseif ($aksi == 'kurang') {
                if ($produk->jumlah > 1) {
                    $produk->jumlah -=1;
                }
            }
        }

        $produk->save();
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $item = Keranjang::where('id', $id)->where('user_id', Auth::id())->first();
        
        if ($item) {
            $item->delete();
            return back()->with('success', 'Produk dihapus dari keranjang');
        }

        return back()->with('error', 'Gagal menghapus produk');
    }
}
