<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
 

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('keywords');
        if ($query){
            $produk = Produk::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama_produk','LIKE','%'.$query.'%')
                ->orWhere('harga', 'LIKE', '%'.$query.'%')
                ->orWhereHas('kategori', function ($keywords) use ($query) {
                    $keywords->where ('nama_kategori', 'LIKE', '%'.$query.'%');
                });
            })->latest()->paginate(5);

            $produk->appends(['keywords'=> $query]);
        } else {
            $produk = Produk::with(['kategori'])->latest()->paginate(5);
        }

        // $produk = Produk::with(['kategori'])->latest()->paginate(5);
        return view('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $kategori = Kategori::all();
        return view('admin.produk.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'status' => 'required',
            'deskripsi' => 'required',
        ]);

        $foto = $request->file('foto_produk');
        $nama_foto = time() . "-" . $foto->getClientOriginalName();
        $foto -> move(public_path('image/produk'), $nama_foto);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'foto_produk' => $nama_foto,
            'status' => $request->status,
        ]);

        return redirect('/produk')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'kategori'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk'=> 'required',
            'kategori_id'=> 'required',
            'harga'=> 'required',
            'stok'=> 'required',
            'status'=> 'required',
            'deskripsi'=> 'required',
            'foto_produk'=> 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $produk = Produk::findOrFail($id);
        if($request->hasFile('foto_produk')){
            $path_lama = public_path('image/produk/' . $produk->foto_produk);
            if (file_exists($path_lama)) {
                @unlink($path_lama);
            }   
            $foto = $request->file('foto_produk');  
            $nama_foto = time() . "-" . $foto->getClientOriginalName();
            $foto-> move(public_path('image/produk'), $nama_foto);
            
            $produk->foto_produk = $nama_foto;
        }

        $produk->update([
            'nama_produk'=> $request->nama_produk,
            'kategori_id'=> $request->kategori_id,
            'harga'=>$request->harga,
            'stok'=>$request->stok,
            'status'=> $request->status,
            'deskripsi'=>$request->deskripsi, 
        ]);

        $produk->save();

        return redirect('/produk')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $produk = Produk::findOrFail($id);

        $filePath = public_path('image/produk/'.$produk->foto_produk);
        if(file_exists($filePath) && is_file($filePath)){
            @unlink($filePath);
        }

        $produk->delete();

        return redirect('/produk')->with('success','Data berhasil dihapus!');
    }

    public function update_status(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->update([
            'status' => $request->status
        ]);
        
        $produk->save();

        return redirect('/produk')->with('success', 'Status Berhasil Diupdate!');
    }
}
