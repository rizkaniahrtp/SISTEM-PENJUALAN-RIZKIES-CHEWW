<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Transaksi::with(['pembayaran', 'detail_transaksis.produk'])
            ->where('user_id', Auth::id())->latest()->get();

        return view('pengunjung.riwayat.index', compact('riwayat'));
    }

    public function detail($id)
    {
        $transaksi = Transaksi::with(['pembayaran','detail_transaksis.produk', 'promosi'])
            ->where('user_id', Auth::id())->findOrFail($id);

        return view('pengunjung.riwayat.detail', compact('transaksi'));
    }
}
