<?php

namespace App\Http\Controllers;

use App\Models\bahan;
use App\Models\supplier;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = $request->input('keywords');
        if ($query){
            $bahan = bahan::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama_bahan','LIKE','%'.$query.'%');
            })->latest()->paginate(5);

            $bahan->appends(['keywords'=> $query]);
        } else {
            $bahan = Bahan::with(['supplier'])->latest()->paginate(5);
        }

        // $bahan = Bahan::latest()->paginate(5);
        return view('admin.bahan.index', compact('bahan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $supplier = Supplier::all();
        return view('admin.bahan.tambah', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id'=> 'required',
            'nama_bahan'=> 'required',
            'stok'=> 'required',
            'satuan'=> 'required',
        ]);

        Bahan::create([
            'supplier_id'=> $request->supplier_id,
            'nama_bahan'=> $request->nama_bahan,
            'stok'=> $request->stok,
            'satuan'=> $request->satuan,
        ]);

        return redirect('/bahan')->with('success','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(bahan $bahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bahan = Bahan::findOrFail($id);
        $supplier = supplier::all();
        return view('admin.bahan.edit', compact('bahan', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_id'=> 'required',
            'nama_bahan'=> 'required',
            'stok'=> 'required',
            'satuan'=> 'required',
        ]);

        $bahan = Bahan::findOrFail($id);

        $bahan::update([
            'supplier_id'=> $request->supplier_id,
            'nama_bahan'=> $request->nama_bahan,
            'stok'=> $request->stok,
            'satuan'=> $request->satuan,
        ]);

        $bahan->save();

        return redirect('/bahan')->with('success','Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $bahan = Bahan::findOrFail($id);
        $bahan->delete();

        return redirect('/bahan')->with('success','Data berhasil dihapus!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function update_satuan(Request $request, $id)
    {
        $bahan = Bahan::findOrFail($id);
        $bahan->update([
            'satuan' => $request->satuan
        ]);
        
        $bahan->save();

        return redirect('/bahan')->with('success', 'Satuan Berhasil Diupdate!');
    }
}
