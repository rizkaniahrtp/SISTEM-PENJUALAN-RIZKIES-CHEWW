@extends('layout.layout')
@section('admin')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-3 text-gray-800">Rizkies Cheww Store🍪✨</h1>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="/detailTransaksi/tambah" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                            <i class="fas fa-plus fa-sm text-black-50"></i> Tambah Detail Transaksi
                        </a>
                        <form action="/detailTransaksi" method="get" class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
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
                            <h6 class="m-0 font-weight-bold text-warning">Data Detail Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th> 
                                            <th>ID Transaksi</th>
                                            <th>Foto Produk</th>     
                                            <th>Nama Produk</th>
                                            <th>Harga Satuan</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>

                                    @if (count($detailTransaksi) < 1)
                                    <tbody>
                                        <tr>
                                            <td colspan="11">
                                                <p class="pt-3 text-center">Tidak ada data untuk ditampilkan</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @else
                                    <tbody>
                                        @foreach ($detailTransaksi as $dt)
                                        <tr>
                                            <td>{{ $loop->iteration + $detailTransaksi->firstItem() - 1 }}</td>
                                            <td>{{ $dt->transaksi->id }}</td>
                                            <td class="text-center">
                                                @if($dt->produk && $dt->produk->foto_produk)
                                                    <img src="{{ asset('image/produk/' . $dt->produk->foto_produk) }}" width="60" class="img-thumbnail">
                                                @else
                                                    <span class="badge badge-secondary">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{ $dt->produk->nama_produk }}</td>
                                            <td class="text-right">Rp {{ number_format($dt->harga_satuan, 0, ',', '.') }}</td>
                                            <td>{{ number_format($dt->jumlah) }}</td>
                                            <td class="text-right">Rp {{ number_format($dt->subtotal, 0, ',', '.') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($dt->created_at)->format('d M Y') }}</td>
                                        </tr>
                                        @include('admin.detail_transaksi.konfirmasi_delete')
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($detailTransaksi->lastPage() > 1)
                        <div class="card-footer">
                            {{ $detailTransaksi->links('pagination::bootstrap-5') }}
                        </div>
                        @endif
                    </div>
                </div>
                <!-- /.container-fluid -->

@endsection