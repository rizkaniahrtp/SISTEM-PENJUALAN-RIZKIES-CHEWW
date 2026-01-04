<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {   
        $query = $request->input('keywords');
        if ($query){
            $kategori = Kategori::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama_kategori','LIKE','%'.$query.'%');
            })->latest()->paginate(5);

            $kategori->appends(['keywords'=> $query]);
        } else {
            $kategori = Kategori::latest()->paginate(5);
        }

        // $kategori = Kategori::latest()->paginate(5);
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        return view('admin.kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori'=> 'required',
        ]);

        Kategori::create([
            'nama_kategori'=> $request->nama_kategori,
        ]);

        return redirect('/kategori')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori'=> 'required',
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama_kategori'=> $request->nama_kategori,
        ]);

        $kategori->save();

        return redirect('/kategori')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect('/kategori')->with('success','Data berhasil dihapus!');
    }
}
