@extends('pengunjung.layout')

@section('hero')
<div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url({{ asset('image/background.jpg') }}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Riwayat Pesanan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Riwayat</li>
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
                    icon: "success",
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    title: "Gagal",
                    text: "{{ session('error') }}",
                    icon: "error",
                });
            </script>
        @endif

        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Riwayat</h5>
            <h1 class="mb-5">Daftar Transaksi</h1>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                
                <div class="bg-white rounded shadow-sm border border-light p-4 overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="text-primary border-bottom border-light">
                                <tr>
                                    <th class="py-3 border-0">ID Order</th>
                                    <th class="py-3 border-0">Tanggal</th>
                                    <th class="py-3 border-0">Total</th>
                                    <th class="py-3 border-0">Metode</th>
                                    <th class="py-3 border-0">Status</th>
                                    <th class="py-3 border-0 text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="border-light">
                                @forelse($riwayat as $r)
                                <tr class="border-bottom border-light">
                                    <td class="text-dark">{{ $r->id }}</td>
                                    <td class="text-muted">{{ $r->created_at }}</td>
                                    <td class="text-dark">Rp {{ number_format($r->total_harga) }}</td>
                                    <td>
                                        <span class="text-uppercase small fw-bold text-muted">
                                            {{ $r->pembayaran->metode ?? '-' }}
                                        </span>
                                    </td>
                                    <td>

                                        @if($r->status == 'menunggu')
                                            <span class="badge bg-warning text-dark fw-normal px-3 py-2" style="border-radius: 5px;">
                                                <i class="fa fa-clock me-1"></i> Menunggu
                                            </span>
                                        @elseif($r->status == 'diproses')
                                            <span class="badge bg-info text-white fw-normal px-3 py-2" style="border-radius: 5px;">
                                                <i class="fa fa-fire me-1"></i> Diproses
                                            </span>
                                        @elseif($r->status == 'selesai')
                                            <span class="badge bg-success fw-normal px-3 py-2" style="border-radius: 5px;">
                                                <i class="fa fa-check me-1"></i> Selesai
                                            </span>
                                        @else
                                            <span class="badge bg-danger fw-normal px-3 py-2" style="border-radius: 5px;">
                                                Dibatalkan
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="/riwayat_transaksi/{{ $r->id }}" class="btn btn-outline-primary btn-sm px-3" style="border-radius: 5px;">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="d-flex flex-column align-items-center">
                                            <div>
                                                <i class="bi bi-cart-x fa-3x text-secondary"></i>
                                            </div>
                                            <h5 class="text-dark mb-3">Belum ada riwayat pesanan</h5>
                                            <a href="/" class="btn btn-primary py-2 px-4" style="border-radius: 10px;">order Now</a>
                                        </div>
                                        <tr>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection