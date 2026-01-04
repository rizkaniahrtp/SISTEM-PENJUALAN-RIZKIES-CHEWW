@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Detail Profil</h6>
            </div>

            @if (session('success'))
                <script>
                    Swal.fire({
                        title: "Berhasil",
                        text: "{{ session()->get('success') }}",
                        icon: "success"
                    });
                </script>
            @endif

            <div class="card-body">
                <form action="/admin/profil/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label>Foto Profil</label>
                    <div class="mb-2">
                        <img src="{{ asset('image/user/'.auth()->user()->foto_profil) }}" width="100" class="img-thumbnail">
                    </div>
                    <input class="form-control @error('foto_profil') is-invalid @enderror" type="file" name="foto_profil" id="foto" value="{{ old('foto_profil', auth()->user()->foto_profil) }}">
                    @error('foto_profil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_user" class="form-control @error('nama_user') is-invalid @enderror" value="{{ old('nama_user', auth()->user()->nama_user) }}" required>
                    @error('nama_user')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', auth()->user()->email) }}" readonly>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>No Hp</label>
                    <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp', auth()->user()->no_hp) }}" required>
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', auth()->user()->alamat) }}" required>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="/dashboard" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>
@endsection