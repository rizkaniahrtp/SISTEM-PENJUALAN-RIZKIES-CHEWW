@extends('layout.layout')
@section('admin')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-secondary-800">Dashboard Rizkies Cheww</h1>
    </div>

    <div class="row">
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body px-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pendapatan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{ number_format($total_pendapatan, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body px-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_pesanan }} Transaksi</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-shopping-bag fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body px-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_pengunjung }} Pelanggan</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-users fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body px-4">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_produk }} Produk</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-box fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4 h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">Tentang Rizkies Cheww</h6>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('image/logo.png') }}" alt="Logo Rizkies Cheww" class="shadow-sm" style="width: 100px; height: 100px;">
                        <div class="mt-3 font-weight-bold text-gray-800" style="font-size: 1.2rem;">Rizkies Cheww</div>
                    </div>
                    <div>
                        <h5 class="font-weight-bold text-dark border-bottom pb-2 text-center">Visi</h5>
                        <p class="text-muted small font-italic mb-4 text-center">
                            "Menjadi pilihan utama dalam penyediaan camilan dan minuman berkualitas yang menghadirkan rasa, kenyamanan, dan kepuasan bagi setiap pelanggan."
                        </p>
                        <h5 class="font-weight-bold text-dark border-bottom pb-2">Misi</h5>
                        <ul class="small text-muted pl-3 mb-0">
                            <li class="mb-2">Menyediakan produk makanan dan minuman dengan kualitas terjaga serta cita rasa yang konsisten.</li>
                            <li class="mb-2">Menghadirkan menu yang variatif dan mengikuti perkembangan selera konsumen.</li>
                            <li class="mb-2">Memberikan pelayanan yang ramah, cepat, dan terpercaya.</li>
                            <li class="mb-2">Memberikan pengalaman belanja yang menyenangkan.</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">Status Toko</h6>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-flex justify-content-between small font-weight-bold mb-1">
                            <span>Target Penjualan Bulanan</span>
                            <span>{{ number_format($persen_pendapatan, 0) }}%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $persen_pendapatan }}%"></div>
                        </div>
                        <div class="small text-muted text-right mt-1">
                            Rp{{ number_format($pendapatan_perbulan, 0, ',', '.') }} / Rp{{ number_format($target_bulanan, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between small font-weight-bold mb-1">
                            <span>Ketersediaan Stok</span>
                            <span>{{ number_format($persen_produk, 0) }}%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $persen_produk }}%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="d-flex justify-content-between small font-weight-bold mb-1">
                            <span>Rating Toko</span>
                            <span><i class="fas fa-star"></i> {{ number_format($avg_rating, 1) }} / 5.0</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $persen_kepuasan }}%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">Pesanan 7 Hari Terakhir</h6>
                </div>
                <div class="card-body">
                    <div style="display: flex; align-items: flex-end; justify-content: space-between; height: 150px; padding: 20px 10px; border-bottom: 1px solid #e3e6f0;">
                        
                    @foreach($grafik_mingguan as $g)
                    <div style="display: flex; flex-direction: column; align-items: center; width: 14%;">
                        <div title="{{ $g['total'] }} Selesai" 
                             style="width: 100%; max-width: 30px; height: {{ $g['tinggi'] }}px; min-height: 1px; background-color: {{ $g['total'] > 0 ? '#f6c23e' : '#eaecf4' }}; border-radius: 4px 4px 0 0; transition: height 0.3s;">
                        </div>                            
                        <div style="margin-top: 5px; font-size: 10px; color: #858796; font-weight: bold;">
                            {{ $g['hari'] }}
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center mt-2 small text-muted">
                    Pesanan yang telah selesai dalam 7 hari
                </div>
            </div>
        </div>
    </div>

        <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">    
                <div class="card-header py-3 bg-white d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-warning">Pesanan Masuk</h6>
                    <span class="badge badge-danger">{{ count($transaksi_masuk) }}Menunggu</span>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-boardered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pelanggan</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transaksi_masuk as $t)
                                <tr>
                                    <td>{{ $t->id }}</td>
                                    <td>{{ $t->user->nama_user }}</td>
                                    <td>Rp{{ number_format($t->total_harga, 0, ',', '.') }}</td>
                                    <td><span class="badge badge-secondary">Menunggu</span></td>
                                    <td class="text-center">
                                        <a href="/transaksi/edit/{{ $t->id }}" class="btn btn-warning btn-sm" title="Proses Pesanan">
                                            <i class="fas fa-sync-alt"></i> Proses
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="fas fa-check-circle text-success mb-2 fa-2x"></i><br>
                                        Tidak ada data untuk ditampilkan
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-warning">Ulasan Terbaru</h6>
                    <a href="/testimoni" class="small text-muted">Lihat Semua</a>
                </div>
                <div class="card-body py-3">
                    @forelse($ulasan_terbaru as $ulasan)
                    <div class="mb-3 border-bottom pb-2">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="font-weight-bold text-dark" style="font-size: 0.9rem;">
                                {{ $ulasan->user->nama_user }}
                            </span>
                            <small class="text-muted" style="font-size: 0.7rem;">
                                {{ $ulasan->created_at ? $ulasan->created_at->diffForHumans() : '-' }}
                            </small>
                        </div>

                        <div class="mb-1 text-warning" style="font-size: 0.7rem;">
                            @for($i=0; $i<$ulasan->rating; $i++) <i class="fas fa-star"></i> @endfor
                            <span class="text-muted ml-1">({{ $ulasan->rating }}/5)</span>
                        </div>
                        
                        <div class="p-2 rounded bg-gray-100 text-dark small font-italic">
                            @if(!empty($ulasan->pesan))
                                "{{ Str::limit($ulasan->pesan, 80) }}"
                            @else
                                <span class="text-muted">Pelanggan ini memberikan rating tanpa komentar.</span>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4 text-muted small">
                        Tidak ada data untuk ditampilkan
                    </div>
                    @endforelse
                </div>

            </div>

        </div>
    </div>


@endsection