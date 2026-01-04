@extends('layout.layout')
@section('admin')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-3 text-gray-800">Rizkies Cheww Store🍪✨</h1>
                     
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <a href="/produk/tambah" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                            <i class="fas fa-plus fa-sm text-black-50"></i> Tambah Produk
                        </a>
                        
                        <form action="/produk" method="get" class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
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
                            <h6 class="m-0 font-weight-bold text-warning">Data Produk</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>                                          
                                            <th>Foto Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Deskripsi</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Status</th>
                                            <th>Tanggal Input</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    @if (count($produk) < 1)
                                    <tbody>
                                        <tr>
                                            <td colspan="11">
                                                <p class="pt-3 text-center">Tidak ada data untuk ditampilkan</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @else
                                    <tbody>
                                        @foreach ($produk as $p)
                                        <tr>
                                            <td>{{ $loop->iteration + $produk->firstItem() - 1 }}</td>
                                            <td><img src="{{ asset('image/produk/' . $p->foto_produk) }}" width="65"></td>
                                            <td>{{ $p->nama_produk }}</td> 
                                            <td>{!! wordwrap($p->deskripsi, 70, "<br>\n") !!}</td>
                                            <td>{{ $p->kategori->nama_kategori }}</td>
                                            <td>Rp{{ number_format($p->harga) }}</td>
                                            <td>{{ $p->stok }}</td>
                                            <td style="min-width: 130px;">
                                                <form action="/produk/update_status/{{ $p->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group mb-0">
                                                        <select class="form-control 
                                                            {{ $p->status == 'tersedia' ? 'border-success text-success font-weight-bold' : 'border-danger text-danger font-weight-bold' }} 
                                                            @error('status') is-invalid @enderror" 
                                                            name="status" 
                                                            onchange="this.form.submit()" required>
                                                            <option value="tersedia" {{ $p->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                                            <option value="kosong" {{ $p->status == 'kosong' ? 'selected' : '' }}>Kosong</option>
                                                        </select>
                                                        @error('status')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </form>                                                
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d M Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="/produk/edit/{{ $p->id }}" class="d-inline-block mr-2 btn btn-sm btn-warning">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#konfirmasi_delete{{ $p->id }}">
                                                         <i class="fas fa-eraser"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('admin.produk.konfirmasi_delete')
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($produk->lastPage() > 1)
                        <div class="card-footer">
                            {{ $produk->links('pagination::bootstrap-5') }}
                        </div>
                        @endif
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection