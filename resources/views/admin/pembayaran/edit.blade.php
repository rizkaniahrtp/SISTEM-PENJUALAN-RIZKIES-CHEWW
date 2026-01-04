@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Edit Pembayaran Rizkies Cheww</h6>
            </div>

            <div class="card-body">
                <form action="/pembayaran/update/{{ $pembayaran->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Metode Pembayaran</label>
                    <select class="form-select @error('metode') is-invalid @enderror" name="metode" required>
                        <option disabled value="">-- Pilih Metode Pembayaran --</option>                        
                        <option value="transfer" {{ (old('metode', $pembayaran->metode) == 'transfer') ? 'selected' : '' }}>Transfer</option>
                        <option value="qris" {{ (old('metode', $pembayaran->metode) == 'qris') ? 'selected' : '' }}>Qris</option>
                        <option value="cash" {{ (old('metode', $pembayaran->metode) == 'cash') ? 'selected' : '' }}>Cash</option>
                    </select>                    
                    @error('metode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                        <option disabled value="">-- Pilih Status --</option>  
                        <option value="menunggu" {{ (old('status', $pembayaran->status) == 'menunggu') ? 'selected' : '' }}>Menunggu</option>                      
                        <option value="berhasil" {{ (old('status', $pembayaran->status) == 'berhasil') ? 'selected' : '' }}>Berhasil</option>
                        <option value="gagal" {{ (old('status', $pembayaran->status) == 'gagal') ? 'selected' : '' }}>Gagal</option>
                    </select>                    
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Tanggal Bayar</label>
                    <input type="datetime-local" class="form-control @error('tanggal_bayar') is-invalid @enderror" 
                           name="tanggal_bayar" value="{{ old('tanggal_bayar', $pembayaran->tanggal_bayar) }}">
                     @error('tanggal_bayar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
                <a href="/pembayaran" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>
@endsection