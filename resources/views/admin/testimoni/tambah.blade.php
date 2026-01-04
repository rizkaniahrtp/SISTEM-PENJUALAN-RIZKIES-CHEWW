@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Tambah Testimoni Rizkies Cheww</h6>
            </div>

            <div class="card-body">
                <form action="/testimoni/tambah" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Pesan</label>
                    <textarea name="pesan" class="form-control @error('pesan') is-invalid @enderror" required>{{ old('pesan') }}</textarea>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Gambar</label>
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar" id="gamgar" required>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="/testimoni" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>
@endsection