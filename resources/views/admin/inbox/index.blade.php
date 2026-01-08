@extends('layout.layout')
@section('admin')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->                    
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">  
                        <h1 class="h3 mb-3 text-gray-800">Rizkies Cheww Store🍪✨</h1>               
                        <form action="/inbox" method="get" class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
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
                            <h6 class="m-0 font-weight-bold text-warning">Inbox</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>                                        
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Pesan</th>
                                            <th>Status</th>
                                            <th>Tanggal Input</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    @if (count($inbox) < 1)
                                    <tbody>
                                        <tr>
                                            <td colspan="11">
                                                <p class="pt-3 text-center">Tidak ada data untuk ditampilkan</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @else
                                    <tbody>
                                        @foreach ($inbox as $i)
                                        <tr>
                                            <td>{{ $loop->iteration + $inbox->firstItem() - 1 }}</td>
                                            <td>{{ $i->nama }}</td> 
                                            <td>{{ $i->email }}</td>
                                            <td>{{ $i->pesan }}</td>
                                            <td style="min-width: 130px;">
                                                <form action="/inbox/update_status/{{ $i->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group mb-0">
                                                        <select class="form-control                                                             
                                                            {{ $i->status == 'baru' ? 'border-secondary text-secondary font-weight-bold' : '' }}
                                                            {{ $i->status == 'diproses' ? 'border-warning text-warning font-weight-bold' : '' }}
                                                            {{ $i->status == 'dibaca' ? 'border-success text-success font-weight-bold' : '' }}
                                                            {{ $i->status == 'diarsipkan' ? 'border-danger text-danger font-weight-bold' : '' }}
                                                            @error('status') is-invalid @enderror" 
                                                            name="status" 
                                                            onchange="this.form.submit()" required>
                                                            <option value="baru" {{ $i->status == 'baru' ? 'selected' : '' }}>Baru</option>
                                                            <option value="dibaca" {{ $i->status == 'dibaca' ? 'selected' : '' }}>Dibaca</option>
                                                            <option value="diproses" {{ $i->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                                            <option value="diarsipkan" {{ $i->status == 'diarsipkan' ? 'selected' : '' }}>Diarsipkan</option>
                                                        </select>
                                                        @error('status')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </form>                                                
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($i->created_at)->translatedFormat('d M Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#konfirmasi_delete{{ $i->id }}">
                                                         <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('admin.inbox.konfirmasi_delete')
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($inbox->lastPage() > 1)
                        <div class="card-footer">
                            {{ $inbox->links('pagination::bootstrap-5') }}
                        </div>
                        @endif
                    </div>
                </div>
                <!-- /.container-fluid -->
@endsection