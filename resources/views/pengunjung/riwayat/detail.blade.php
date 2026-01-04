@extends('pengunjung.layout')

@section('hero')
        <div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url({{ asset('image/background.jpg') }}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Detail Pesanan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Deatil Pesanan</li>
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
                            title: "Success!",
                            text: "{{ session('success') }}",
                            icon: "success",
                        });
                    </script>
                @endif

                <div class="row g-5">
                    <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-white rounded p-4 shadow-sm border border-light">
                            <h5 class="ff-secondary text-primary mb-4 border-bottom border-light pb-2">
                                <i class="fa fa-shopping-bag me-2"></i>Rincian Pesanan
                            </h5>
                            
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="text-muted small border-light">
                                        <tr>
                                            <th>Produk</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksi->detail_transaksis as $dt)
                                        <tr class="border-bottom border-light">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('image/produk/'.$dt->produk->foto_produk) }}" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                                    <div>
                                                        <h6 class="mb-0 text-dark fw-bold">{{ $dt->produk->nama_produk }}</h6>
                                                        <small class="text-muted">Rp {{ number_format($dt->harga_satuan) }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $dt->jumlah }}</td>
                                            <td class="text-end">Rp {{ number_format($dt->subtotal) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="border-light">
                                        <tr>
                                            <td colspan="2" class="text-end text-muted">Subtotal</td>
                                            <td class="text-end">Rp {{ number_format($transaksi->subtotal) }}</td>
                                        </tr>
                                        @if($transaksi->potongan_harga > 0)
                                        <tr>
                                            <td colspan="2" class="text-end text-danger">Diskon Voucher</td>
                                            <td class="text-end text-danger">- Rp {{ number_format($transaksi->potongan_harga) }}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td colspan="2" class="text-end fw-bold text-primary">Total Bayar</td>
                                            <td class="text-end text-primary fs-6">Rp {{ number_format($transaksi->total_harga) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        @if($transaksi->status == 'selesai')
                        <div class="mt-4">
                            <div class="card shadow-sm border-light">
                                <div class="card-body p-4">
                                    <h5 class="card-title text-primary ff-secondary mb-4">Beri Ulasan</h5>
                                    
                                    <form action="/testimoni/kirim" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if($transaksi->detail_transaksis->isNotEmpty())
                                            <input type="hidden" name="produk_id" value="{{ $transaksi->detail_transaksis->first()->produk_id }}">
                                        @endif

                                        <div class="mb-3">
                                            <label class="form-label small fw-bold">Seberapa puas Anda?</label>
                                            <select name="rating" class="form-select" required>
                                                <option value="" selected disabled>-- Pilih Penilaian --</option>
                                                <option value="5">⭐⭐⭐⭐⭐ - Sangat Puas</option>
                                                <option value="4">⭐⭐⭐⭐ - Puas</option>
                                                <option value="3">⭐⭐⭐ - Cukup</option>
                                                <option value="2">⭐⭐ - Kurang</option>
                                                <option value="1">⭐ - Kecewa</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label small fw-bold">Komentar</label>
                                            <textarea name="pesan" class="form-control" rows="3" placeholder="Tulis ulasan Anda disini..." required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label small fw-bold">Gambar</label>
                                            <input type="file" name="gambar" class="form-control" accept="image/*">
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">                        
                        <div class="bg-white rounded p-4 shadow-sm mb-4 position-relative overflow-hidden">
                            <h5 class="ff-secondary text-primary mb-4">Status Pembayaran</h5>
                            @if($transaksi->status == 'menunggu')
                                <div class="alert alert-warning border-0 d-flex align-items-center mb-4" role="alert">
                                    <i class="fa fa-clock fa-2x me-3"></i>
                                    <div>
                                        <strong>Menunggu Pembayaran</strong>
                                        <div class="small">Silakan selesaikan tagihan Anda.</div>
                                    </div>
                                </div>

                                @if($transaksi->pembayaran->metode == 'transfer')
                                    <div class="text-center">
                                        <p class="text-muted mb-2 small">Transfer Bank ke:</p>
                                        <div class="bg-light p-3 rounded border border-light mb-3">
                                            <img src="{{ asset('image/bri.jpg') }}" height="30" class="mb-2" alt="Bank Logo"> 
                                            <h4 class="mb-0 text-dark fw-bold letter-spacing-1">4353 0103 4829 536</h4>
                                            <small class="text-muted">a.n Rizkies Cheww</small>
                                        </div>
                                        <p class="small text-danger fst-italic">*Mohon transfer sesuai nominal.</p>
                                    </div>

                                @elseif($transaksi->pembayaran->metode == 'qris')
                                    <div class="text-center">
                                        <p class="text-muted mb-2 small">Scan QR Code:</p>
                                        <div class="p-2 bg-white border rounded d-inline-block mb-3">
                                            <img src="{{ asset('image/qris.png') }}" class="img-fluid" width="180" alt="QRIS">
                                        </div>
                                    </div>

                                @elseif($transaksi->pembayaran->metode == 'cash')
                                    <div class="text-center py-3">
                                        <i class="fa fa-money-bill-wave fa-3x text-success mb-3"></i>
                                        <h6>Pembayaran Tunai</h6>
                                        <p class="text-muted small">Mohon siapkan uang tunai sebesar <strong>Rp {{ number_format($transaksi->total_harga) }}</strong>.</p>
                                    </div>
                                @endif

                            @else
                                <div class="text-center py-4">
                                    @if($transaksi->status == 'diproses')
                                        <i class="fa fa-fire fa-4x text-info mb-3"></i>
                                        <h4>Sedang Diproses</h4>
                                        <p class="text-muted">Pesanan sedang dibuat di dapur.</p>
                                    @elseif($transaksi->status == 'selesai')
                                        <i class="fa fa-check-circle fa-4x text-success mb-3"></i>
                                        <h4>Selesai</h4>
                                        <p class="text-muted">Terima kasih sudah berbelanja!</p>
                                    @else
                                        <i class="fa fa-times-circle fa-4x text-danger mb-3"></i>
                                        <h4>Dibatalkan</h4>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="d-grid gap-2">
                            @if($transaksi->status == 'menunggu' && $transaksi->pembayaran->metode != 'cash')
                            <span class="btn btn-success py-3 fw-bold shadow-sm" style="border-radius: 10px;">
                                <i class="fa fa-envelope me-2"></i> Konfirmasi Pesanan ke rizkiescheww@gmail.com</span>
                            @elseif($transaksi->status == 'menunggu' && $transaksi->pembayaran->metode == 'cash')
                            <span class="btn btn-success py-3 fw-bold shadow-sm" style="border-radius: 10px;">
                                <i class="fa fa-envelope me-2"></i> Chat rizkiescheww@gmail.com </span>
                            @endif

                            <a href="/riwayat_transaksi" class="btn btn-outline-secondary py-3" style="border-radius: 10px;">
                                <i class="fa fa-arrow-left me-2"></i> Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
@endsection