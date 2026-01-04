<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('keywords');
        if ($query){
            $supplier = Supplier::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama_supplier','LIKE','%'.$query.'%')
                ->orWhere('alamat', 'LIKE', '%'.$query.'%');
            })->latest()->paginate(5);

            $supplier->appends(['keywords'=> $query]);
        } else {
            $supplier = Supplier::latest()->paginate(5);
        }

        // $supplier = Supplier::latest()->paginate(5);
        return view('admin.supplier.index', compact('supplier'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        return view('admin.supplier.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request-> validate([
            'nama_supplier' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'no_hp'=> $request->no_hp,
            'alamat'=> $request->alamat,
        ]);

        return redirect('/supplier')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $supplier = Supplier::findOrFail($id);

        $supplier->update([
            'nama_supplier' => $request->nama_supplier,
            'no_hp'=> $request->no_hp,
            'alamat'=> $request->alamat,
        ]);

        $supplier->save();

        return redirect('/supplier')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect('/supplier')->with('success','Data berhasil dihapus!');
    }
}
