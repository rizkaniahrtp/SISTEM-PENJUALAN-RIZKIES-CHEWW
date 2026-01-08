@extends('layout.layout')
@section('admin')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-3 text-gray-800">Rizkies Cheww Store🍪✨</h1>
                    <div style="display: flex; justify-content: space-between; align-items: center;"> 
                        <a href="/transaksi/tambah" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                            <i class="fas fa-plus fa-sm text-black-50"></i> Tambah Transaksi
                        </a>  
                        <form action="/transaksi" method="get" class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-1 small" name="keywords" value="{{ request('keywords') }}" placeholder="Cari sesuatu..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-warning" name="tombol_search" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- DataTales -->
                    @if (session('success'))
                        <script>
                            Swal.fire({
                                title: "Berhasil",
                                text: "{{ session()->get('success') }}",
                                icon: "success"
                            });
                        </script>
                    @endif
                    @if (session('error'))
                        <script>
                            Swal.fire({
                                title: "Gagal",
                                text: "{{ session()->get('error') }}",
                                icon: "error"
                            });
                        </script>
                    @endif

                    <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-warning">Data Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th> 
                                            <th>ID Transaksi</th>     
                                            <th>Nama Pembeli</th>
                                            <th>Nama Promosi</th>
                                            <th>Subtotal</th>
                                            <th>Promo</th>
                                            <th>Total</th>
                                            <th>Metode Pengiriman</th>
                                            <th>Detail Pengiriman</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    @if (count($transaksi) < 1)
                                    <tbody>
                                        <tr>
                                            <td colspan="11">
                                                <p class="pt-3 text-center">Tidak ada data untuk ditampilkan</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @else
                                    <tbody>
                                        @foreach ($transaksi as $t)
                                        <tr>
                                            <td>{{ $loop->iteration + $transaksi->firstItem() - 1 }}</td>
                                            <td>{{ $t->id }}</td>
                                            <td>{{ $t->user->nama_user }}</td>
                                            <td>{{ $t->promosi->nama_promosi ?? '-' }}</td>
                                            <td>Rp{{ number_format($t->subtotal) }}</td>
                                            <td>Rp{{ number_format($t->potongan_harga) }}</td>
                                            <td>Rp{{ number_format($t->total_harga) }}</td>
                                            <td>{{ $t->metode_pengantaran }}</td>
                                            <td>{{ $t->detail_pengantaran ?? '-'}}
                                            </td>
                                            <td style="min-width: 130px;">
                                                <form action="/transaksi/update_status/{{ $t->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group mb-0">
                                                        <select class="form-control
                                                            {{ $t->status == 'menunggu' ? 'border-secondary text-secondary font-weight-bold' : '' }}
                                                            {{ $t->status == 'diproses' ? 'border-warning text-warning font-weight-bold' : '' }}
                                                            {{ $t->status == 'selesai' ? 'border-success text-success font-weight-bold' : '' }}
                                                            {{ $t->status == 'dibatalkan' ? 'border-danger text-danger font-weight-bold' : '' }}
                                                            @error('status') is-invalid @enderror" 
                                                            name="status" 
                                                            onchange="this.form.submit()" required>
                                                            <option value="menunggu" {{ $t->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                            <option value="diproses" {{ $t->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                                            <option value="selesai" {{ $t->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                            <option value="dibatalkan" {{ $t->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                                        </select>
                                                        @error('status')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </form>                                                
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($t->created_at)->format('d M Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="/transaksi/edit/{{ $t->id }}" class="d-inline-block mr-2 btn btn-sm btn-warning">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#konfirmasi_delete{{ $t->id }}">
                                                         <i class="fas fa-eraser"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('admin.transaksi.konfirmasi_delete')
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($transaksi->lastPage() > 1)
                        <div class="card-footer">
                            {{ $transaksi->links('pagination::bootstrap-5') }}
                        </div>
                        @endif
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection