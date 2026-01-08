<?php

namespace App\Http\Controllers;

use App\Models\Promosi;
use App\Models\Produk;
use Illuminate\Http\Request;

class PromosiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('keywords');
        if ($query){
            $promosi = Promosi::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama_promosi','LIKE','%'.$query.'%')
                ->orWhere('status', 'LIKE', '%'.$query.'%')
                ->orWhere('kode_promo', 'LIKE', '%'.$query.'%');
            })->latest()->paginate(5);

            $promosi->appends(['keywords'=> $query]);
        } else {
            $promosi = Promosi::latest()->paginate(5);
        }

        // $promosi = Promosi::latest()->paginate(5);
        return view('admin.promosi.index', compact('promosi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        return view('admin.promosi.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_promo'=> 'required',
            'nama_promosi'=> 'required',
            'diskon'=> 'required',
            'min_belanja'=> 'required',
            'tanggal_mulai'=> 'required',
            'tanggal_selesai'=> 'required',
            'status'=> 'required',
        ]);

        Promosi::create([
            'kode_promo' => $request->kode_promo,
            'nama_promosi' => $request-> nama_promosi,
            'diskon' => $request-> diskon,
            'min_belanja'=> $request->min_belanja,
            'tanggal_mulai'=> $request->tanggal_mulai,
            'tanggal_selesai'=> $request->tanggal_selesai,
            'status'=> $request->status,
        ]);

        return redirect('/promosi')->with('success', 'Data Berhasil Ditambahkan'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(promosi $promosi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $promosi = Promosi::findOrFail($id);
        return view('admin.promosi.edit', compact('promosi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_promo'=> 'required',
            'nama_promosi'=> 'required',
            'diskon'=> 'required',
            'min_belanja'=> 'required',
            'tanggal_mulai'=> 'required',
            'tanggal_selesai'=> 'required',
            'status'=> 'required',
        ]);

        $promosi = Promosi::findOrFail($id);

        $promosi->update([
            'kode_promo'=> $request->kode_promo,
            'nama_promosi' => $request-> nama_promosi,
            'diskon' => $request-> diskon,
            'min_belanja'=> $request->min_belanja,
            'tanggal_mulai'=> $request->tanggal_mulai,
            'tanggal_selesai'=> $request->tanggal_selesai,
            'status'=> $request->status,
        ]);

        $promosi->save();

        return redirect('/promosi')->with('success','Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $promosi = Promosi::findOrFail($id);
        $promosi->delete();
        return redirect('/promosi')->with('success','Data berhasil dihapus!');
    }

    public function update_status(Request $request, $id)
    {
        $promosi = Promosi::findOrFail($id);
        $promosi->update([
            'status' => $request->status
        ]);
        
        return redirect('/promosi')->with('success', 'Status Berhasil Diupdate!');
    }
}
