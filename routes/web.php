<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ============ A D M I N ==============

// DASHBOARD  
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('peran:admin');
 
// PRODUK 
Route::get('/produk', [ProdukController::class, 'index'])->middleware('peran:admin');
Route::get('/produk/tambah', [ProdukController::class,'tambah'])->middleware('peran:admin');
Route::post('/produk/tambah', [ProdukController::class,'store'])->middleware('peran:admin');
Route::get('/produk/edit/{id}', [ProdukController::class,'edit'])->middleware('peran:admin');
Route::put('/produk/update/{id}', [ProdukController::class,'update'])->middleware('peran:admin');
Route::delete('/produk/delete/{id}', [ProdukController::class,'delete'])->middleware('peran:admin');
Route::put('/produk/update_status/{id}', [ProdukController::class,'update_status'])->middleware('peran:admin');

// KATEGORI 
Route::get('/kategori', [KategoriController::class, 'index'])->middleware('peran:admin');
Route::get('/kategori/tambah', [KategoriController::class,'tambah'])->middleware('peran:admin');
Route::post('/kategori/tambah', [KategoriController::class,'store'])->middleware('peran:admin');
Route::get('/kategori/edit/{id}', [KategoriController::class,'edit'])->middleware('peran:admin');
Route::put('/kategori/update/{id}', [KategoriController::class,'update'])->middleware('peran:admin');
Route::delete('/kategori/delete/{id}', [KategoriController::class,'delete'])->middleware('peran:admin');

// USER 
Route::get('/user', [UserController::class, 'index'])->middleware('peran:admin');
Route::get('/user/tambah', [UserController::class,'tambah'])->middleware('peran:admin');
Route::post('/user/tambah', [UserController::class,'store'])->middleware('peran:admin');
Route::get('/user/edit/{id}', [UserController::class,'edit'])->middleware('peran:admin');
Route::put('/user/update/{id}', [UserController::class,'update'])->middleware('peran:admin');
Route::delete('/user/delete/{id}', [UserController::class,'delete'])->middleware('peran:admin');

// SUPPLIER 
Route::get('/supplier', [SupplierController::class, 'index'])->middleware('peran:admin');
Route::get('/supplier/tambah', [SupplierController::class,'tambah'])->middleware('peran:admin');
Route::post('/supplier/tambah', [SupplierController::class,'store'])->middleware('peran:admin');
Route::get('/supplier/edit/{id}', [SupplierController::class,'edit'])->middleware('peran:admin');
Route::put('/supplier/update/{id}', [SupplierController::class,'update'])->middleware('peran:admin');
Route::delete('/supplier/delete/{id}', [SupplierController::class,'delete'])->middleware('peran:admin');

// TRANSAKSI 
Route::get('/transaksi', [TransaksiController::class, 'index'])->middleware('peran:admin');
Route::get('/transaksi/tambah', [TransaksiController::class,'tambah'])->middleware('peran:admin');
Route::post('/transaksi/tambah', [TransaksiController::class,'store'])->middleware('peran:admin');
Route::get('/transaksi/edit/{id}', [TransaksiController::class,'edit'])->middleware('peran:admin');
Route::put('/transaksi/update/{id}', [TransaksiController::class,'update'])->middleware('peran:admin');
Route::delete('/transaksi/delete/{id}', [TransaksiController::class,'delete'])->middleware('peran:admin');
Route::put('/transaksi/update_status/{id}', [TransaksiController::class,'update_status'])->middleware('peran:admin');

// DETAIL TRANSAKSI 
Route::get('/detailTransaksi', [DetailTransaksiController::class, 'index'])->middleware('peran:admin');
Route::get('/detailTransaksi/tambah', [DetailTransaksiController::class,'tambah'])->middleware('peran:admin');
Route::post('/detailTransaksi/tambah', [DetailTransaksiController::class,'store'])->middleware('peran:admin');
Route::delete('/detailtransaksi/delete/{id}', [DetailTransaksiController::class,'delete'])->middleware('peran:admin');

// PEMBAYARAN 
Route::get('/pembayaran', [PembayaranController::class, 'index'])->middleware('peran:admin');
Route::get('/pembayaran/tambah', [PembayaranController::class,'tambah'])->middleware('peran:admin');
Route::post('/pembayaran/tambah', [PembayaranController::class,'store'])->middleware('peran:admin');
Route::get('/pembayaran/edit/{id}', [PembayaranController::class,'edit'])->middleware('peran:admin');
Route::put('/pembayaran/update/{id}', [PembayaranController::class,'update'])->middleware('peran:admin');
Route::delete('/pembayaran/delete/{id}', [PembayaranController::class,'delete'])->middleware('peran:admin');
Route::put('/pembayaran/update_status/{id}', [PembayaranController::class,'update_status'])->middleware('peran:admin');
Route::put('/pemabayaran/update_metode/{id}', [PembayaranController::class,'update_metode'])->middleware('peran:admin');

// PROMOSI
Route::get('/promosi', [PromosiController::class, 'index'])->middleware('peran:admin');
Route::get('/promosi/tambah', [PromosiController::class,'tambah'])->middleware('peran:admin');
Route::post('/promosi/tambah', [PromosiController::class,'store'])->middleware('peran:admin');
Route::get('/promosi/edit/{id}', [PromosiController::class,'edit'])->middleware('peran:admin');
Route::put('/promosi/update/{id}', [PromosiController::class,'update'])->middleware('peran:admin');
Route::delete('/promosi/delete/{id}', [PromosiController::class,'delete'])->middleware('peran:admin');
Route::put('/promosi/update_status/{id}', [PromosiController::class,'update_status'])->middleware('peran:admin');

// INBOX
Route::get('/inbox', [InboxController::class, 'index'])->middleware('peran:admin');
Route::put('/inbox/update_status/{id}', [InboxController::class,'update_status'])->middleware('peran:admin');

// TESTIMONI
Route::get('/testimoni', [TestimoniController::class, 'index'])->middleware('peran:admin');
Route::get('/testimoni/tambah', [TestimoniController::class,'tambah'])->middleware('peran:admin');
Route::post('/testimoni/tambah', [TestimoniController::class,'store'])->middleware('peran:admin');
Route::get('/testimoni/edit/{id}', [TestimoniController::class,'edit'])->middleware('peran:admin');
Route::put('/testimoni/update/{id}', [TestimoniController::class,'update'])->middleware('peran:admin');
Route::delete('/testimoni/delete/{id}', [TestimoniController::class,'delete'])->middleware('peran:admin');
Route::put('/testimoni/update_status/{id}', [TestimoniController::class,'update_status'])->middleware('peran:admin');

// BAHAN
Route::get('/bahan', [BahanController::class, 'index'])->middleware('peran:admin');
Route::get('/bahan/tambah', [BahanController::class,'tambah'])->middleware('peran:admin');
Route::post('/bahan/tambah', [BahanController::class,'store'])->middleware('peran:admin');
Route::get('/bahan/edit/{id}', [BahanController::class,'edit'])->middleware('peran:admin');
Route::put('/bahan/update/{id}', [BahanController::class,'update'])->middleware('peran:admin');
Route::delete('/bahan/delete/{id}', [BahanController::class,'delete'])->middleware('peran:admin');
Route::put('/bahan/update_satuan/{id}', [BahanController::class,'update_satuan'])->middleware('peran:admin');

// PROFIL
Route::get('/admin/profil', [HomeController::class, 'profil_view'])->middleware('peran:admin');
Route::post('/admin/profil/{id}', [HomeController::class, 'update_profil'])->middleware('peran:admin');
Route::get('/admin/ubah_password', [HomeController::class, 'ubah_password_view'])->middleware('peran:admin');
Route::post('/admin/ubah_password{id}', [HomeController::class, 'ubah_password'])->middleware('peran:admin');

// ============ U M U M ==============
// INBOX
Route::post('/inbox/store', [InboxController::class, 'store']);

// HOME
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about', [HomeController::class,'about']);
Route::get('/menu', [HomeController::class,'menu']);
Route::get('/contact', [HomeController::class,'contact']);

// REGISTER
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);

// LOGIN
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class,'authenticate']);

// LOGOUT
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

// ============ P E N G U N J U N G  ==============

Route::middleware(['auth', 'peran:pengunjung'])->group(function () {
    // PROFIL
    Route::get('/profil', [ProfilController::class,'index']);
    Route::put('/profil/update', [ProfilController::class,'update']);

    // PASSWORD
    Route::get('/password', [ProfilController::class, 'edit']);
    Route::put('/password', [ProfilController::class, 'update_pw']);

    
});

// ============ U S E R  ==============
Route::middleware(['auth'])->group(function(){
    Route::get('/keranjang', [KeranjangController::class,'index']); 
    Route::get('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah']);
    Route::get('/keranjang/edit/{id}/{aksi}', [KeranjangController::class,'edit']);
    Route::delete('/keranjang/delete/{id}', [KeranjangController::class,'delete']);

    Route::get('/checkout', [CheckoutController::class,'index']);
    Route::post('/checkout/proses', [CheckoutController::class,'transaksi']);

    Route::get('/riwayat_transaksi', [RiwayatController::class,'index']);
    Route::get('/riwayat_transaksi/{id}', [RiwayatController::class,'detail']);

    Route::post('/testimoni/kirim', [TestimoniController::class,'store_pengunjung']);
});
