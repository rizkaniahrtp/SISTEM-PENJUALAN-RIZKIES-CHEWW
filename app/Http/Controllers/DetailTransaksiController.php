<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('keywords');
        if ($query){
            $detailTransaksi = detailTransaksi::with(['transaksi', 'produk'])
                ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('jumlah','LIKE','%'.$query.'%')
                ->orWhere('subtotal', 'LIKE', '%'.$query.'%')
                ->orWhereHas('produk', function ($keywords) use ($query) {
                    $keywords->where ('nama_produk', 'LIKE', '%'.$query.'%');
                });
            })->latest()->paginate(5);

            $detailTransaksi->appends(['keywords'=> $query]);
        } else {
            $detailTransaksi = detailTransaksi::with(['transaksi', 'produk'])->latest()->paginate(5);
        }

        // $detailTransaksi = detailTransaksi::with(['transaksi', 'produk'])->latest()->paginate(5);
        return view ('admin.detail_transaksi.index', compact('detailTransaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $transaksi = Transaksi::whereIn('status', ['menunggu', 'diproses'])->latest()->get();
        $produk = Produk::where('status', 'tersedia')->get();
        return view('admin.detail_transaksi.tambah', compact('transaksi', 'produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
     {
        $request-> validate([
            'transaksi_id' => 'required',
            'produk_id'=> 'required',
            'jumlah'=> 'required',
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $transaksi = Transaksi::findOrFail($request->transaksi_id);
        
        if($produk->stok < $request->jumlah){
            return back()->with('error','Stok tidak mencukupi!');
        }
        $harga_satuan = $produk->harga;
        $subtotal = $harga_satuan * $request->jumlah;

        DetailTransaksi::create([
            'transaksi_id' => $request->transaksi_id,
            'produk_id' => $request->produk_id,
            'jumlah'=> $request->jumlah,
            'harga_satuan'=> $harga_satuan,
            'subtotal'=> $subtotal,
        ]);        

        $produk->decrement('stok', $request->jumlah);

        $this->updateTotalTransaksi($transaksi);
        return redirect('/detailTransaksi')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(detailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $detailTransaksi = detailTransaksi::findOrFail($id);
        $produk = Produk::findOrFail($detailTransaksi->produk_id);
        $transaksi = Transaksi::find($detailTransaksi->transaksi_id);

        if($produk){
            $produk->increment('stok', $detailTransaksi->jumlah);
        }

        $detailTransaksi->delete();

        if($transaksi) {
            $this->updateTotalTransaksi($transaksi);
        }

        return redirect('/detailTransaksi')->with('success','Data berhasil dihapus!');
    }

    private function updateTotalTransaksi($transaksi)
    {         
        $subtotal_baru = $transaksi->detail_transaksis()->sum('subtotal');
        
        $grand_total_baru = max($subtotal_baru - $transaksi->potongan_harga, 0);

        $transaksi->update([
            'subtotal' => $subtotal_baru,
            'total_harga' => $grand_total_baru
        ]);

    }
}
