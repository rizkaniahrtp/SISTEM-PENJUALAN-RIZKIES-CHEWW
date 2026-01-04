<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('keywords');
        
        if ($query){
            $pembayaran = Pembayaran::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('status','LIKE','%'.$query.'%')
                ->orWhere('metode', 'LIKE', '%'.$query.'%')
                ->orWhereHas('transaksi', function ($keywords) use ($query) {
                    $keywords->where ('total_harga', 'LIKE', '%'.$query.'%');
                });
            })->latest()->paginate(5);
            $pembayaran->appends(['keywords'=> $query]);
        } else {
            $pembayaran = Pembayaran::with(['transaksi.user'])->latest()->paginate(5);
        }

        // $pembayaran = Pembayaran::with(['transaksi', 'user'])->latest()->paginate(5);
        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $transaksi = Transaksi::doesntHave('pembayaran')
        ->where('status', '!=', 'dibatalkan')
        ->wheere('status', '!=', 'selesai')->get();

        return view('admin.pembayaran.tambah', compact('transaksi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id'=> 'required',
            'metode'=> 'required',
            'status'=> 'required',
            'tanggal_bayar'=> 'nullable|date',
        ]);

        $tanggal_bayar = $request->tanggal_bayar;
        if ($request->status == 'berhasil' && empty($tanggal_bayar)) {
            $tanggal_bayar = now();
        }

        Pembayaran::create([
            'transaksi_id'=> $request->transaksi_id,
            'metode' => $request->metode,
            'status'=> $request->status,
            'tanggal_bayar'=> $tanggal_bayar,
        ]);

        if ($request->status == 'berhasil') {
            $transaksi = Transaksi::find($request->transaksi_id);
            if ($transaksi && $transaksi->status == 'menunggu') {
                $transaksi->update(['status' => 'diproses']);
            }
        }

        return redirect('/pembayaran')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::with('transaksi.user')->findOrFail($id);
        return view('admin.pembayaran.edit', compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'metode'=> 'required',
            'status'=> 'required',
            'tanggal_bayar'=> 'nullable|date',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);

        $tanggal_bayar = $request->tanggal_bayar;
        if ($request->status == 'berhasil' && empty($tanggal_bayar)) {
            $tanggal_bayar = now();
        }

        $pembayaran->update([
            'metode' => $request->metode,
            'status'=> $request->status,
            'tanggal_bayar'=> $tanggal_bayar,
        ]);

        if ($request->status == 'berhasil') {
            $pembayaran->transaksi->update(['status' => 'diproses']);
        }
        elseif ($request->status == 'gagal') {
            $pembayaran->transaksi->update(['status' => 'dibatalkan']);
        }

        $pembayaran->save();

        return redirect('/pembayaran')->with('success','Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembayaran $pembayaran)
    {
        //
    }

     public function update_status(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'status' => $request->status
        ]);

        if ($request->status == 'berhasil' && empty($pembayaran->tanggal_bayar)) {
            $dataUpdate['tanggal_bayar'] = now();
        }
        
        $pembayaran->save();

        return redirect('/pembayaran')->with('success', 'Status Berhasil Diupdate!');
    }

    public function update_metode(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'metode' => $request->metode
        ]);
        
        $pembayaran->save();

        return redirect('/pembayaran')->with('success', 'Status Berhasil Diupdate!');
    }
}
