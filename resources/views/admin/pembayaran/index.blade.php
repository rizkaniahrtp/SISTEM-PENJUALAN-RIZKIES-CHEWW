@extends('layout.layout')
@section('admin')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-3 text-gray-800">Rizkies Cheww Store🍪✨</h1>
                    <div style="display: flex; justify-content: space-between; align-items: center;">   
                        <a href="/pembayaran/tambah" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                            <i class="fas fa-plus fa-sm text-black-50"></i> Tambah Pembayaran
                        </a>                  
                        <form action="/pembayaran" method="get" class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
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

                    <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-warning">Data Pembayaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th> 
                                            <th>ID Transaksi</th>   
                                            <th>Nama Pembeli</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    @if (count($pembayaran) < 1)
                                    <tbody>
                                        <tr>
                                            <td colspan="11">
                                                <p class="pt-3 text-center">Tidak ada data untuk ditampilkan</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @else
                                    <tbody>
                                        @foreach ($pembayaran as $pm)
                                        <tr>
                                            <td>{{ $loop->iteration + $pembayaran->firstItem() - 1 }}</td>
                                            <td>{{ $pm->transaksi->id }}</td>
                                            <td>{{ $pm->transaksi->user->nama_user }}</td>
                                            <td style="min-width: 130px;">
                                                <form action="/pembayaran/update_metode/{{ $pm->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group mb-0">
                                                        <select class="form-control 
                                                            @error('metode') is-invalid @enderror" 
                                                            name="metode" 
                                                            onchange="this.form.submit()" required>
                                                            <option value="transfer" {{ $pm->metode == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                                            <option value="qris" {{ $pm->metode == 'qris' ? 'selected' : '' }}>Qris</option>
                                                            <option value="cash" {{ $pm->metode == 'cash' ? 'selected' : '' }}>cash</option>
                                                        </select>
                                                        @error('metode')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </form>                                                
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($pm->tanggal_bayar)->format('d M Y') }}</td>
                                            <td style="min-width: 130px;">
                                                <form action="/pembayaran/update_status/{{ $pm->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group mb-0">
                                                        <select class="form-control 
                                                            {{ $pm->status == 'menunggu' ? 'border-secondary text-secondary font-weight-bold' : '' }} 
                                                            {{ $pm->status == 'berhasil' ? 'border-success text-success font-weight-bold' : '' }} 
                                                            {{ $pm->status == 'gagal' ? 'border-danger text-danger font-weight-bold' : '' }} 
                                                            @error('status') is-invalid @enderror" 
                                                            name="status" 
                                                            onchange="this.form.submit()" required>
                                                            <option value="menunggu" {{ $pm->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                            <option value="berhasil" {{ $pm->status == 'berhasil' ? 'selected' : '' }}>Berhasil</option>
                                                            <option value="gagal" {{ $pm->status == 'gagal' ? 'selected' : '' }}>Gagal</option>
                                                        </select>
                                                        @error('status')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </form>                                                
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="/pembayaran/edit/{{ $pm->id }}" class="d-inline-block mr-2 btn btn-sm btn-warning">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($pembayaran->lastPage() > 1)
                        <div class="card-footer">
                            {{ $pembayaran->links('pagination::bootstrap-5') }}
                        </div>
                        @endif
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection