@extends('layout.layout')
@section('admin')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-3 text-gray-800">Rizkies Cheww Store🍪✨</h1>
                     
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <a href="/bahan/tambah" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                            <i class="fas fa-plus fa-sm text-black-50"></i> Tambah Bahan
                        </a>                        
                        <form action="/bahan" method="get" class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
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
                            <h6 class="m-0 font-weight-bold text-warning">Data Bahan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>     
                                            <th>Nama Bahan</th>
                                            <th>Supplier</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                            <th>Tanggal Input</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    @if (count($bahan) < 1)
                                    <tbody>
                                        <tr>
                                            <td colspan="11">
                                                <p class="pt-3 text-center">Tidak ada data untuk ditampilkan</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @else
                                    <tbody>
                                        @foreach ($bahan as $b)
                                        <tr>
                                            <td>{{ $loop->iteration + $bahan->firstItem() - 1 }}</td>
                                            <td style="min-width: 80px;">{{ $b->nama_bahan }}</td> 
                                            <td style="min-width: 80px;">{{ $b->supplier->nama_supplier }}</td>
                                            <td style="max-width: 80px;">{{ $b->stok }}</td>
                                            <td style="min-width: 90px;">
                                                <form action="/bahan/update_satuan/{{ $b->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group mb-0">
                                                        <select class="form-control 
                                                            @error('satuan') is-invalid @enderror" 
                                                            name="satuan" 
                                                            onchange="this.form.submit()" required>
                                                            <option value="kg" {{ $b->satuan == 'kg' ? 'selected' : '' }}>Kg</option>
                                                            <option value="gram" {{ $b->satuan == 'gram' ? 'selected' : '' }}>Gram</option>
                                                            <option value="liter" {{ $b->satuan == 'liter' ? 'selected' : '' }}>Liter</option>
                                                            <option value="pcs" {{ $b->satuan == 'pcs' ? 'selected' : '' }}>Pcs</option>
                                                        </select>
                                                        @error('satuan')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </form>                                                
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($b->created_at)->format('d M Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="/bahan/edit/{{ $b->id }}" class="d-inline-block mr-2 btn btn-sm btn-warning">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#konfirmasi_delete{{ $b->id }}">
                                                         <i class="fas fa-eraser"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('admin.bahan.konfirmasi_delete')
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($bahan->lastPage() > 1)
                        <div class="card-footer">
                            {{ $bahan->links('pagination::bootstrap-5') }}
                        </div>
                        @endif
                    </div>
                </div>
                <!-- /.container-fluid -->

@endsection