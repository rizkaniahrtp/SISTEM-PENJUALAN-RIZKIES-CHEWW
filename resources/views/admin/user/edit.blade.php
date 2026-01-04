@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Edit User Rizkies Cheww</h6>
            </div>

            <div class="card-body">
                <form action="/user/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Foto Profil</label>
                    <div class="mb-2">
                        <img src="{{ asset('image/user/'.$user->foto_profil) }}" width="100" class="img-thumbnail">
                    </div>
                    <input class="form-control @error('foto_profil') is-invalid @enderror" type="file" name="foto_profil" id="foto" value="{{ old('foto_profil', $user->foto_profil) }}">
                    @error('foto_profil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama_user" class="form-control @error('nama_user') is-invalid @enderror" value="{{ old('nama_user', $user->nama_user) }}" required>
                    @error('nama_user')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>No Hp</label>
                    <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp', $user->no_hp) }}" required>
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Kosongkan jika password tidak diperbarui" class="form-control  @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                 <div class="mb-3">
                    <label>Peran</label>
                    <select class="form-select @error('peran') is-invalid @enderror" name="peran" required>
                        <option disabled value="">-- Pilih Peran --</option>                        
                        <option value="admin" {{ (old('peran', $user->peran) == 'admin') ? 'selected' : '' }}>Admin</option>
                        <option value="pengunjung" {{ (old('peran', $user->peran) == 'pengunjung') ? 'selected' : '' }}>Pengunjung</option>
                    </select>
                    
                    @error('peran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $user->alamat) }}" required>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
                <a href="/user" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>
@endsection