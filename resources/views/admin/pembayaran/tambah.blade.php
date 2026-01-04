@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Tambah Pembayaran Rizkies Cheww</h6>
            </div>

            <div class="card-body">
                <form action="/pembayaran/tambah/" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="font-weight-bold">Nama Pembeli</label>
                    <select name="transaksi_id" class="form-control @error('transaksi_id') is-invalid @enderror" required>
                        <option disabled selected>-- Pilih Nama Pembeli --</option>
                        @foreach ($transaksi as $t)
                            <option value="{{ $t->id }}" {{ old('transaksi_id') == $t->id ? 'selected' : '' }}>
                                {{ $t->user->nama_user }} — Rp{{ number_format($t->total_harga) }}
                            </option>
                        @endforeach
                    </select>
                    @error('transaksi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Metode Pembayaran</label>
                    <select class="form-select @error('metode_pembayaran') is-invalid @enderror" name="metode_pembayaran" required>
                        <option selected disabled>-- Pilih Metode --</option>
                        <option value="transfer" {{ old('metode_pembayaran') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                        <option value="qris" {{ old('metode_pembayaran') == 'qris' ? 'selected' : '' }}>Qris</option>
                        <option value="cash" {{ old('metode_pembayaran') == 'cash' ? 'selected' : '' }}>Cash</option>
                    </select>
                    @error('metode_pembayaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" id="status" value="{{ old('status') }}"  required>
                        <option selected disabled>-- Pilih Status --</option>
                        <option value="menunggu">Menunggu</option> 
                        <option value="berhasil">Berhasil</option> 
                        <option value="gagal">Gagal</option>      
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="/pembayaran" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>
@endsection