@extends('pengunjung.layout')

@section('hero')
        <div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url({{ asset('image/background.jpg') }}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
@endsection

@section('content')
<div class="container-xxl py-5">
    <div class="container">

        @if (session('success'))
            <script>
                Swal.fire({
                    title: "Berhasil",
                    text: "{{ session('success') }}",
                    icon: "success"
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    title: "Gagal",
                    text: "{{ session('error') }}",
                    icon: "error"
                });
            </script>
        @endif

        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Checkout</h5>
            <h1 class="mb-5">Konfirmasi Pesanan</h1>
        </div>
        
        <form action="/checkout/proses" method="POST">
            @csrf
            <div class="row g-5">
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white text-center rounded p-5 shadow-sm border border-light">
                        <h6 class="text-primary section-title mb-4 border-bottom pb-2">Informasi Pelanggan</h6>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="nama_penerima" class="form-control border-light shadow-none bg-light" id="nama" 
                                        value="{{ old('nama_penerima', Auth::user()->nama_user) }}" required style="border-radius: 10px;">
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="no_hp_penerima" class="form-control border-light shadow-none bg-light" id="hp" 
                                        value="{{ old('no_hp_penerima', Auth::user()->no_hp) }}" required style="border-radius: 10px;">
                                    <label for="hp">No. Handphone</label>
                                </div>
                            </div>
                            
                            <div class="col-12 mt-4">
                                <h6 class="text-primary mb-3 section-title">Metode Pengiriman & Pembayaran</h6>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <select name="metode_pengantaran" class="form-select p-3 bg-light border-light shadow-none" required style="border-radius: 10px;">
                                            <option selected disabled>Pilih Metode Pengiriman</option>
                                            <option value="diambil" {{ old('metode_pengantaran') == 'diambil' ? 'selected' : '' }}>Ambil di Toko</option>
                                            <option value="diantar" {{ old('metode_pengantaran') == 'diantar' ? 'selected' : '' }}>Delivery</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="metode_pembayaran" class="form-select p-3 bg-light border-light shadow-none" required style="border-radius: 10px;">
                                            <option selected disabled>Pilih Metode Pembayaran</option>
                                            <option value="transfer" {{ old('metode_pembayaran') == 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
                                            <option value="qris" {{ old('metode_pembayaran') == 'qris' ? 'selected' : '' }}>QRIS</option>
                                            <option value="cash" {{ old('metode_pembayaran') == 'cash' ? 'selected' : '' }}>Tunai / Cash</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-floating">
                                    <textarea name="detail_pengantaran" class="form-control border-light shadow-none bg-light" placeholder="Alamat Lengkap" id="alamat" style="height:100px; border-radius: 15px;">
                                        {{ old('detail_pengantaran') }}
                                    </textarea>
                                    <label for="alamat">Alamat Lengkap</label>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <h6 class="text-primary mb-3 section-title">Voucher Promo</h6>
                                <div class="input-group overflow-hidden shadow-sm" style="border-radius: 10px;">
                                    <select name="promosi_id" class="form-select p-3 border-0 bg-light">
                                        <option value="">Pilih Voucher</option>
                                        @foreach($promosi as $p)
                                            <option value="{{ $p->id }}" {{ old('promosi_id') == $p->id ? 'selected' : '' }}>
                                                {{ $p->nama_promosi }} (Rp {{ number_format($p->diskon) }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-primary px-4" type="submit" name="action" value="gunakan_promo">Gunakan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="card border-0 shadow-lg rounded p-2" style="background: linear-gradient(145deg, #ffffff, #f8f9fa);">
                        <div class="card-header bg-transparent border-0 pt-4 pb-0 text-center">
                            <h4 class=" section-title ff-secondary text-primary mb-0">Pesanan Anda</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="order-list mb-4 overflow-auto" style="max-height: 300px;">
                                @foreach($keranjang as $k)
                                <div class="d-flex justify-content-between align-items-center border-bottom border-secondary py-3">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('image/produk/'.$k->produk->foto_produk) }}" class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-0 text-dark fw-bold">{{ $k->produk->nama_produk }}</h6>
                                            <small class="text-muted">{{ $k->jumlah }} x Rp {{ number_format($k->produk->harga) }}</small>
                                        </div>
                                    </div>
                                    <span class="fw-bold text-dark">Rp {{ number_format($k->produk->harga * $k->jumlah) }}</span>
                                </div>
                                @endforeach
                            </div>

                            <div class="rounded p-4 bg-white shadow-sm border border-light">
                                <div class="d-flex justify-content-between text-muted mb-2">
                                    <span>Subtotal</span>
                                    <span>Rp {{ number_format($subtotal) }}</span>
                                </div>

                                @if(session('diskon_tampil') > 0)
                                <div class="d-flex justify-content-between text-danger mb-2">
                                    <span>Diskon Voucher</span>
                                    <span>- Rp {{ number_format(session('diskon_tampil')) }}</span>
                                </div>
                                @endif

                                <hr class="my-3 border-secondary" style="opacity: 0.2;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 fw-bold">Total Akhir</h6>
                                    <h6 class="text-primary fw-bold mb-0">Rp {{ number_format(max($subtotal - session('diskon_tampil', 0), 0)) }}</h6>
                                </div>
                            </div>
                            <button type="submit" name="action" value="buat_pesanan" class="btn btn-primary w-100 py-2 mt-3 text-uppercase fw-bold shadow-sm" style="border-radius: 10px; letter-spacing: 1px;">
                                Buat Pesanan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection