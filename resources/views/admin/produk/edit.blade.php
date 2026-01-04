@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Edit Produk Rizkies Cheww</h6>
            </div>

            <div class="card-body">
                <form action="/produk/update/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Foto Produk</label>
                    <div class="mb-2">
                        <img src="{{ asset('image/produk/'.$produk->foto_produk) }}" width="100" class="img-thumbnail">
                    </div>
                    <input class="form-control @error('foto_produk') is-invalid @enderror" type="file" name="foto_produk" id="foto">
                    @error('foto_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                    @error('nama_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori" required>
                        <option selected disabled>-- Pilih Kategori --</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k-> id }}" {{ old('kategori_id', $produk->kategori_id) == $k->id ? 'selected' : '' }}>{{ $k-> nama_kategori }}</option>
                        @endforeach                        
                    </select>
                    @error('kategori_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $produk->harga) }}" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ old('stok', $produk->stok) }}" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                        <option selected disabled>-- Pilih Status --</option>
                        <option value="tersedia" {{ old('status', $produk->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="kosong" {{ old('status', $produk->status) == 'kosong' ? 'selected' : '' }}>Kosong</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
                <a href="/produk" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection