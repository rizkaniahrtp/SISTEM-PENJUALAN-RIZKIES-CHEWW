<?php

namespace App\Http\Controllers;

use App\Models\detailTransaksi;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Promosi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('keywords');
        if ($query){
            $transaksi = Transaksi::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('status','LIKE','%'.$query.'%')
                ->orWhereHas('user', function ($keywords) use ($query) {
                    $keywords->where ('nama_user', 'LIKE', '%'.$query.'%');
                })
                ->orWhereHas('promosi', function ($keywords) use ($query) {
                    $keywords->where ('nama_promosi', 'LIKE', '%'.$query.'%');
                });
            })->latest()->paginate(5);

            $transaksi->appends(['keywords'=> $query]);
        } else {
            $transaksi = Transaksi::with(['user', 'promosi'])->latest()->paginate(5);
        }

        // $transaksi = Transaksi::with(['user', 'promosi'])->latest()->paginate(5);
        return view('admin.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $user = User::all();
        $promosi = Promosi::where('status', 'aktif')->get();
        return view('admin.transaksi.tambah', compact('user', 'promosi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'user_id' => 'required',
            'promosi_id'=> 'nullable',
            'metode_pengantaran'=> 'required',
            'detail_pengantaran'=> 'required_if:metode_pengantaran,diantar',
            'subtotal' => 'required|numeric',
            'status' => 'required',
            
        ]);

        $subtotal = $request->subtotal;
        $potongan_harga = 0;
        $promosi_id = $request->promosi_id;

        if ($promosi_id){
            $promosi = Promosi::find($promosi_id);
            if ($subtotal >= $promosi->min_belanja){
                $potongan_harga = $promosi->diskon;
            } else{
                $promosi_id = null;
                return back()->with('error', 'Tidak memenuhi minimal belanja promo!');
            }
        }

        $total_harga = max($subtotal - $potongan_harga, 0);

        Transaksi::create([
            'user_id' => $request->user_id,
            'promosi_id' => $promosi_id,
            'metode_pengantaran'=> $request->metode_pengantaran,
            'detail_pengantaran'=> $request->detail_pengantaran,
            'subtotal' => $subtotal,
            'potongan_harga'=> $potongan_harga,
            'total_harga' => $total_harga,
            'status'=> $request->status,
        ]);

        return redirect('/transaksi')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaksi = Transaksi::with(['user', 'detail_transaksi.produk', 'pembayaran', 'promosi'])->findOrFail( $id );
        return view('admin.transaksi.detail', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $user = User::all();
        $promosi = Promosi::where('status', 'aktif')->get();
        return view('admin.transaksi.edit', compact('transaksi','user', 'promosi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request-> validate([
            'user_id' => 'required',
            'promosi_id'=> 'nullable',
            'metode_pengantaran'=> 'required',
            'detail_pengantaran'=> 'required_if:metode_pengantaran,diantar',
            'subtotal' => 'required|numeric',
            'status' => 'required',            
        ]);

        $transaksi = Transaksi::findOrFail($id);

        $subtotal = $request->subtotal;
        $potongan_harga = 0;
        $promosi_id = $request->promosi_id;

        if ($promosi_id){
            $promosi = Promosi::find($promosi_id);
            if ($subtotal >= $promosi->min_belanja){
                $potongan_harga = $promosi->diskon;
            } else{
                $promosi_id = null;
                return back()->with('error', 'Tidak memenuhi minimal belanja promo!');
            }
        }

        $total_harga = max($subtotal - $potongan_harga, 0);

        $transaksi->update([
            'user_id' => $request->user_id,
            'promosi_id' => $promosi_id,
            'metode_pengantaran'=> $request->metode_pengantaran,
            'detail_pengantaran'=> $request->metode_pengantaran == 'diantar' ? $request->detail_pengantaran : null,
            'subtotal' => $subtotal,
            'potongan_harga' => $potongan_harga,
            'total_harga' => $total_harga,
            'status' => $request->status,
        ]);
        
        $transaksi->save();

        return redirect('/transaksi')->with('success', 'Data Berhasil Diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect('/transaksi')->with('success','Data berhasil dihapus!');
    }

    public function update_status(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'status' => $request->status
        ]);
        
        $transaksi->save();

        return redirect('/transaksi')->with('success', 'Status Berhasil Diupdate!');
    }
}
