@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Tambah Detail Transaksi Rizkies Cheww</h6>
            </div>

            <div class="card-body">
                <form action="/detailTransaksi/tambah" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Pilih Transaksi</label>
                    <select name="transaksi_id" class="form-control @error('transaksi_id') is-invalid @enderror" required>
                        <option value="">-- Pilih ID Transaksi --</option>
                        @foreach($transaksi as $t)
                            <option value="{{ $t->id }}" {{ old('transaksi_id') == $t->id ? 'selected' : '' }}>
                                ID: {{ $t->id }} - {{ $t->user->nama_user ?? 'Guest' }} (Status: {{ ucfirst($t->status) }})
                            </option>
                        @endforeach
                    </select>
                    @error('transaksi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Nama Produk</label>
                    <select name="produk_id" class="form-control @error('produk_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach($produk as $p)
                        <option value="{{ $p->id }}" {{ old('produk_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_produk }} (Stok: {{ $p->stok }} - Rp {{ number_format($p->harga, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
                    @error('produk_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}" required>
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 

                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="/detailTransaksi" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>
@endsection