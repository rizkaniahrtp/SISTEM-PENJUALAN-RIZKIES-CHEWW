@extends('layout.layout')
@section('admin')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-3 text-gray-800">Rizkies Cheww Store🍪✨</h1>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <a href="/user/tambah" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                            <i class="fas fa-plus fa-sm text-black-50"></i> Tambah User
                        </a>

                        <form action="/user" method="get" class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
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
                            <h6 class="m-0 font-weight-bold text-warning">Data User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>    
                                            <th>Foto</th>                                        
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No Hp</th>
                                            <th>Password</th>
                                            <th>Peran</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Input</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    @if (count($user) < 1)
                                    <tbody>
                                        <tr>
                                            <td colspan="11">
                                                <p class="pt-3 text-center">Tidak ada data untuk ditampilkan</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @else
                                    <tbody>
                                        @foreach ($user as $u)
                                        <tr>
                                            <td>{{ $loop->iteration + $user->firstItem() - 1 }}</td>
                                            <td><img src="{{ asset('image/user/' . $u->foto_profil) }}" width="65"></td>
                                            <td style="min-width: 180px">{{ $u->nama_user }}</td> 
                                            <td style="max-width: 150px">{{ $u->email }}</td>                                            
                                            <td>{{ $u->no_hp }}</td>
                                            <td style="max-width: 200px">{{ $u->password }}</td>
                                            <td>{{ $u->peran }}</td>
                                            <td style="min-width: 90px">{{ $u->alamat }}</td>
                                            <td style="min-width: 110px">{{ \Carbon\Carbon::parse($u->created_at)->format('d M Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="/user/edit/{{ $u->id }}" class="d-inline-block mr-2 btn btn-sm btn-warning">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#konfirmasi_delete{{ $u->id }}">
                                                         <i class="fas fa-eraser"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('admin.user.konfirmasi_delete')
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($user->lastPage() > 1)
                        <div class="card-footer">
                            {{ $user->links('pagination::bootstrap-5') }}
                        </div>
                        @endif
                    </div>
                </div>
                <!-- /.container-fluid -->

@endsection