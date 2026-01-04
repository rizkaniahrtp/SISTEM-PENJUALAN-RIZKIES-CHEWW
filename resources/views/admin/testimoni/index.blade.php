@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800">Rizkies Cheww Store🍪✨</h1>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <form action="/testimoni" method="get" class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
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
                <h6 class="m-0 font-weight-bold text-warning">Data Testimoni</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nama Produk</th>
                                <th>Pesan</th>
                                <th>Gambar</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Tanggal Input</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        @if (count($testimoni) < 1)
                            <tbody>
                                <tr>
                                    <td colspan="11">
                                        <p class="pt-3 text-center">Tidak ada data untuk ditampilkan</p>
                                    </td>
                                </tr>
                            </tbody>
                        @else
                            <tbody>
                                @foreach ($testimoni as $tm)
                                    <tr>
                                        <td>{{ $loop->iteration + $testimoni->firstItem() - 1 }}</td>
                                        <td>{{ $tm->user->nama_user }}</td>
                                        <td>{{ $tm->produk->nama_produk }}</td>
                                        <td>{{ $tm->pesan }}</td>
                                        <td><img src="{{ asset('image/testimoni/' . $tm->gambar) }}" width="65"></td>
                                        <td>{{ $tm->rating }}/5</td>
                                        <td style="min-width: 130px;">
                                                <form action="/testimoni/update_status/{{ $tm->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group mb-0">
                                                        <select class="form-control                                                             
                                                            {{ $tm->status == 'menunggu' ? 'border-secondary text-secondary font-weight-bold' : '' }}
                                                            {{ $tm->status == 'disetujui' ? 'border-success text-success font-weight-bold' : '' }}
                                                            {{ $tm->status == 'diarsipkan' ? 'border-danger text-danger font-weight-bold' : '' }}
                                                            @error('status') is-invalid @enderror" 
                                                            name="status" 
                                                            onchange="this.form.submit()" required>
                                                            <option value="menunggu" {{ $tm->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                            <option value="disetujui" {{ $tm->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                                            <option value="diarsipkan" {{ $tm->status == 'diarsipkan' ? 'selected' : '' }}>Diarsipkan</option>
                                                        </select>
                                                        @error('status')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </form>                                                
                                            </td>
                                        <td>{{ \Carbon\Carbon::parse($tm->created_at)->format('d M Y') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/testimoni/edit/{{ $tm->id }}"
                                                    class="d-inline-block mr-2 btn btn-sm btn-warning">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#konfirmasi_delete{{ $tm->id }}">
                                                    <i class="fas fa-eraser"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('admin.testimoni.konfirmasi_delete')
                                @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($testimoni->lastPage() > 1)
                <div class="card-footer">
                    {{ $testimoni->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
