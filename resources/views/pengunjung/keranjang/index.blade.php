@extends('pengunjung.layout')

@section('hero')
<div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url({{ asset('image/background.jpg') }}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Keranjang</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Keranjang</li>
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

        <div class="row justify-content-center">
            <div class="text-center mb-4">
                <h4 class="text-primary section-title ff-secondary fw-normal">Keranjang Belanja</h4>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($keranjang as $k)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($k->produk->foto_produk) 
                                                <img src="{{ asset('/image/produk/'. $k->produk->foto_produk) }}" width="40" class="me-2 rounded">
                                            @endif
                                            <span class="fw-bold">{{ $k->produk->nama_produk }}</span>
                                        </div>
                                    </td>
                                    <td>Rp {{ number_format($k->produk->harga) }}</td>
                                    <td>
                                        <div class="input-group input-group-sm justify-content-center" style="width: 100px; margin: auto;">                                            
                                            @if($k->jumlah > 1)
                                                <a href="/keranjang/edit/{{ $k->id }}/kurang" class="btn btn-outline-secondary">
                                                    <i class="fas fa-minus"></i>
                                                </a>
                                            @else
                                                <button class="btn btn-outline-secondary" disabled>
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            @endif
                                            <input type="text" class="form-control text-center bg-white" value="{{ $k->jumlah }}" readonly>
                                            <a href="/keranjang/edit/{{ $k->id }}/tambah" class="btn btn-outline-secondary">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>Rp {{ number_format($k->produk->harga * $k->jumlah) }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#konfirmasi_delete{{ $k->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @include('pengunjung.keranjang.konfirmasi_delete')                                
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bi bi-cart-x display-4 mb-3 d-block"></i>
                                            <p>Keranjang Anda masih kosong.</p>
                                            <a href="/menu" class="btn btn-primary btn-sm rounded-pill mt-2">Order Now</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow">
                    <div class="card-body">                        
                        <div class="d-flex justify-content-between mb-3">
                            <span>Total Produk</span>
                            <span>{{ $keranjang->sum('jumlah') }} Pcs</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold">Total Bayar</span>
                            <span class="fw-bold text-primary">Rp {{ number_format($total_harga) }}</span>
                        </div>

                        <a href="/checkout" class="btn btn-primary w-100 py-2 rounded-pill {{ $keranjang->isEmpty() ? 'disabled' : ''}}">
                            <i class="bi bi-wallet"></i> Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection