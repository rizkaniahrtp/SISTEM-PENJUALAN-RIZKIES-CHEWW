<?php

namespace App\Http\Controllers;

use App\Models\detailTransaksi;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use App\Models\Produk;
use App\Models\Promosi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::with('produk')->where('user_id', Auth::id())->get();
        if($keranjang->isEmpty()){
            return redirect('/keranjang')->with('error','Keranjang kosong!');
        }

        $subtotal = $keranjang->sum(function($produk){
            return $produk->produk->harga * $produk->jumlah;
        });

        $promosi = Promosi::where('status', 'aktif')
            ->whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_selesai','>=',now())
            ->where('min_belanja', '<=', $subtotal)->get();

        return view('pengunjung.checkout', compact('keranjang','subtotal', 'promosi'));
    }   

    public function transaksi(Request $request)
    {
        $keranjang = Keranjang::with('produk')->where('user_id', Auth::id())->get();
        if($keranjang->isEmpty()){
            return redirect('/keranjang')->with('error','Keranjang kosong!');
        }

        $subtotal = $keranjang->sum(function($produk){
            return $produk->produk->harga * $produk->jumlah;
        });

        if ($request->action == 'gunakan_promo') {
            $diskon_hitung = 0;

            if($request->promosi_id) {
                $promo = Promosi::where('id', $request->promosi_id)
                    ->where('status', 'aktif')
                    ->whereDate('tanggal_mulai', '<=', now())
                    ->whereDate('tanggal_selesai', '>=', now())
                    ->where('min_belanja', '<=', $subtotal)
                    ->first();
                
                if($promo) {
                    $diskon_hitung = $promo->diskon;
                }
            }
            
            return back()->withInput()->with('diskon_tampil', $diskon_hitung);
        }

        $request->validate([
            'metode_pengantaran' => 'required|in:diambil,diantar',
            'metode_pembayaran' => 'required|in:transfer,qris,cash',
            'detail_pengantaran' => 'required_if:metode_pengantaran,diantar',
        ]);

        try{
            $transaksi = DB::transaction(function() use ($request, $keranjang, $subtotal){
                $diskon = 0;
                $promosi_id = null;

                if ($request->promosi_id){
                    $promo = Promosi::where('id', $request->promosi_id)
                        ->where('status', 'aktif')
                        ->whereDate('tanggal_mulai', '<=', now())
                        ->whereDate('tanggal_selesai', '>=', now())
                        ->where('min_belanja', '<=', $subtotal)
                        ->first();

                    if ($promo) {
                        $diskon = $promo->diskon;
                        $promosi_id = $promo->id;
                    }
                }

                $total = max($subtotal - $diskon, 0);
            
                $transaksi = Transaksi::create([
                    'user_id' => Auth::id(),
                    'promosi_id' => $promosi_id,
                    'metode_pengantaran' => $request->metode_pengantaran,
                    'detail_pengantaran' => $request->metode_pengantaran == 'diantar' ? $request->detail_pengantaran : 'Diambil di Toko',
                    'subtotal' => $subtotal,
                    'potongan_harga'=> $diskon,
                    'total_harga' => $total,
                    'status' => 'menunggu',
                ]);

                foreach ($keranjang as $k) {
                    $produk = Produk::lockForUpdate()->findOrFail($k->produk_id);
                    if($produk->stok < $k->jumlah){
                        throw new \Exception("{$produk->nama_produk} tidak tersedia");
                    }

                    detailTransaksi::create([
                        'transaksi_id' => $transaksi->id,
                        'produk_id' => $produk->id,
                        'jumlah' => $k->jumlah,
                        'harga_satuan' => $produk->harga,
                        'subtotal' => $produk->harga * $k->jumlah,
                    ]);
                    
                    $produk->decrement('stok', $k->jumlah);
                }

                Pembayaran::create([
                    'transaksi_id' => $transaksi->id,
                    'metode' => $request->metode_pembayaran,
                    'status' => 'menunggu',
                ]);

                Keranjang::where('user_id', Auth::id())->delete();
                return $transaksi;
            });

            if($request->metode_pembayaran == 'cash'){
                return redirect('/riwayat_transaksi')->with('succsess','Pesanan berhasil dibuat!');
            } else {
                return redirect('/riwayat_transaksi/' . $transaksi->id)->with('success', 'Pesanan Dibuat! Silakan selesaikan pembayaran.');
            }           

        } catch(\Exception $error){
            return back()->with('error', 'Gagal memproses pesanan: ' . $error->getMessage())->withInput();
            // dd($error->getMessage() );
        }   
    }
}


