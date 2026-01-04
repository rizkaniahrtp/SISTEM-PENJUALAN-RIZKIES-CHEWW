<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Testimoni;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_pendapatan = Transaksi::where('status', 'selesai')->whereHas('pembayaran', function ($query) {
            $query->where('status', 'berhasil');
        })->sum('total_harga');
        $total_pesanan = Transaksi::count();
        $total_pengunjung = User::where('peran', 'pengunjung')->count();
        $total_produk = Produk::count();

        // ==========================

        $transaksi_masuk = Transaksi::with('user')->where('status', 'menunggu')->latest()->get();

        // ==========================

        $ulasan_terbaru = Testimoni::with('user')->latest()->take(3)->get();

        // ==========================

        $target_bulanan = 10000000;
        $pendapatan_perbulan = Transaksi::where('status', 'selesai')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereHas('pembayaran', function ($query) {
                $query->where('status', 'berhasil');
            })->sum('total_harga');

        if ($target_bulanan > 0){
            $persen_pendapatan = ($pendapatan_perbulan / $target_bulanan) *100;
        } else {
            $persen_pendapatan = 0;
        }

        if ($persen_pendapatan > 100){
            $persen_pendapatan = 100;
        }

        // ---------------------------

        $produk = Produk::count();
        $produk_aman = Produk::where('stok', '>', 5)->count();
        if ($produk > 0){
            $persen_produk = ($produk_aman / $produk) * 100;
        } else {
            $persen_produk = 0;
        }

        // --------------------------

        $avg_rating = Testimoni::avg('rating');
        if (!$avg_rating){
            $avg_rating = 0;
            $persen_kepuasan = 0;
        } else {
            $persen_kepuasan = ($avg_rating / 5) * 100;
        }

        // ==========================

        $grafik_mingguan = [];
        for ($i = 6; $i >=0; $i--) {
            $tanggal = Carbon::now()->subDays($i);
            $total = Transaksi::whereDate('created_at', $tanggal)->where('status', 'selesai')->count();
            $tinggi = ($total / 25) * 100;
            if ($tinggi > 100) {
                $tinggi = 100;
            } 

            $grafik_mingguan[] = [
                'hari' => $tanggal->format('D'),
                'total'=> $total,
                'tinggi' => $tinggi
            ];
        }

        // ==========================

        return view('admin.dashboard', compact(
            'total_pendapatan', 
            'total_pesanan', 
            'total_pengunjung', 
            'total_produk',
            'transaksi_masuk',
            'persen_pendapatan',
            'persen_kepuasan',
            'persen_produk',
            'avg_rating',
            'pendapatan_perbulan',
            'grafik_mingguan',
            'ulasan_terbaru',
            'target_bulanan',
        ));   
    }
}