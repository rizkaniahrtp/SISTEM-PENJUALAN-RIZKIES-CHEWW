@extends('pengunjung.layout')

@section('hero')
        <div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url({{ asset('image/background.jpg') }}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Menu</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
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
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our Menu</h5>
                    <h1 class="mb-5">Menu of Rizkies Cheww</h1>
                </div>

                    <!-- MENU START -->
                    <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                        @if ($query)
                        <div class="bg-light p-4 rounded shadow-sm mb-5">
                            <h4 class="fw-bold mb-1">Hasil pencarian <span class="text-primary">"{{ $query }}"</span></h4>
                            <p class="mb-0 text-muted">Ditemukan {{ $produk->count() }} produk yang sesuai.</p>
                            <a href="/menu" class="btn btn-sm btn-danger mt-2 rounded-pill px-3">
                                <i class="bi bi-x-circle me-1"></i> Hapus Pencarian
                            </a>
                        </div>

                        <div class="row g-6">
                            @forelse($produk->where('stok', '>', 0)->where('status', '!=', 'kosong') as $p)
                            <div class="col-lg-6 mb-4">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('image/produk/' . $p->foto_produk ) }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h6 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{ $p->nama_produk }}</span>
                                            <span class="text-primary">Rp {{ number_format($p->harga, 0, ',', '.') }}</span>
                                        </h6>
                                        <small class="fst-italic">{{ Str::limit($p->deskripsi, 50) }}</small>
                                        <div class="mt-2">
                                            <a href="/keranjang/tambah/{{ $p->id }}" class="btn btn-sm btn-primary rounded-pill py-1 px-3" style="font-size: 0.7rem;">
                                                <i class="bi bi-cart-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            @empty
                            <div class="col-12 text-center py-5">
                                <p class="text-muted">Menu di kategori ini sedang kosong.</p>
                            </div> 
                            @endforelse
                        </div>
                        @else
                        <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                            @foreach ($kategori as $k)
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 pb-3 {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill" href="#tab-{{ $k->id }}">
                                    <div class="ps-3">
                                        <small class="text-body">Category</small>
                                        <h6 class="mt-n1 mb-0">{{ $k->nama_kategori }}</h6>
                                    </div>
                                </a>
                            </li> 
                            @endforeach
                        </ul>

                        <div class="tab-content">
                            @foreach ($kategori as $k)
                            <div id="tab-{{ $k->id }}" class="tab-pane fade show p-0 {{ $loop->first ? 'active' : '' }}">
                                <div class="row g-6">
                                    @forelse($k->produk->where('stok', '>', 0)->where('status', '!=', 'kosong') as $p)
                                    <div class="col-lg-6 mb-4">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('image/produk/' . $p->foto_produk ) }}" alt="" style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h6 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>{{ $p->nama_produk }}</span>
                                                    <span class="text-primary">Rp {{ number_format($p->harga, 0, ',', '.') }}</span>
                                                </h6>
                                                <small class="fst-italic">{{ Str::limit($p->deskripsi, 50) }}</small>
                                                <div class="mt-2">
                                                    <a href="/keranjang/tambah/{{ $p->id }}" class="btn btn-sm btn-primary rounded-pill py-1 px-3" style="font-size: 0.7rem;"><i class="bi bi-cart-fill"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    @empty
                                    <div class="col-12 text-center py-5">
                                        <p class="text-muted">Menu di kategori ini sedang kosong.</p>
                                    </div> 
                                    @endforelse
                                </div>
                            </div>
                            @endforeach 
                        </div>
                        @endif                        
                    </div>
                </div>
            </div>
        </div>
@endsection