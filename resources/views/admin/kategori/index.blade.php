@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="/kategori/tambah" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                <i class="fas fa-plus fa-sm text-black-50"></i> Tambah Kategori
            </a>   

            <form action="/kategori" method="get" class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
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
                <h6 class="m-0 font-weight-bold text-warning">Data Kategori</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Tanggal Input</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        @if (count($kategori) < 1)
                            <tbody>
                                <tr>
                                    <td colspan="11">
                                        <p class="pt-3 text-center">Tidak ada data untuk ditampilkan</p>
                                    </td>
                                </tr>
                            </tbody>
                        @else
                            <tbody>
                                @foreach ($kategori as $k)
                                    <tr>
                                        <td>{{ $loop->iteration + $kategori->firstItem() - 1 }}</td>
                                        <td>{{ $k->nama_kategori }}</td>
                                        <td>{{ \Carbon\Carbon::parse($k->created_at)->format('d M Y') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/kategori/edit/{{ $k->id }}"
                                                    class="d-inline-block mr-2 btn btn-sm btn-warning">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#konfirmasi_delete{{ $k->id }}">
                                                    <i class="fas fa-eraser"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('admin.kategori.konfirmasi_delete')
                                @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($kategori->lastPage() > 1)
                <div class="card-footer">
                    {{ $kategori->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
