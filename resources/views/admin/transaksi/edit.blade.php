@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Edit Transaksi Rizkies Cheww</h6>
            </div>

            <div class="card-body">
                <form action="/transaksi/update/{{ $transaksi->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama Pembeli</label>
                    <select name="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                        <option disabled value="">-- Pilih Pembeli --</option>
                        @foreach ($user as $u)
                            <option value="{{ $u->id }}" {{ (old('user_id', $transaksi->user_id ?? '') == $u->id) ? 'selected' : '' }}>
                                {{ $u->nama_user }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Nama Promosi</label>
                    <select name="promosi_id" class="form-select @error('promosi_id') is-invalid @enderror">
                        <option value="">-- Pilih Promosi --</option>
                        @foreach ($promosi as $p)
                            <option value="{{ $p->id }}" {{ $transaksi->promosi_id == $p->id ? 'selected' : '' }}>
                                {{ $p->nama_promosi }} (Min {{ number_format($p->min_belanja) }})
                            </option>
                        @endforeach
                    </select>
                    @error('promosi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Subtotal</label>
                    <div class="input-group">
                        <input type="number" name="subtotal" class="form-control @error('subtotal') is-invalid @enderror" 
                            value="{{ old('subtotal', $transaksi->subtotal) }}" min="0" placeholder="Masukkan total kasar">
                    </div>
                    <small class="form-text text-muted mt-2">
                        <strong class="text-success">Rp {{ number_format($transaksi->total_harga) }}</strong> 
                            (setelah diskon Rp {{ number_format($transaksi->potongan_harga) }})
                    </small>
                    @error('subtotal')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label>Metode Pengantaran</label>
                    <select class="form-select @error('metode_pengantaran') is-invalid @enderror" name="metode_pengantaran" required>
                        <option disabled value="">-- Pilih Metode Pengantaran --</option>                        
                        <option value="diambil" {{ (old('metode_pengantaran', $transaksi->metode_pengantaran) == 'diambil') ? 'selected' : '' }}>Diambil ke toko</option>
                        <option value="diantar" {{ (old('metode_pengantaran', $transaksi->metode_pengantaran) == 'diantar') ? 'selected' : '' }}>Diantar ke tempat </option>
                    </select>                    
                    @error('metode_pengantaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>    
                
                <div class="form-group" id="box-alamat" 
                    style="{{ old('metode_pengantaran', $transaksi->metode_pengantaran) == 'diantar' ? 'display:block' : 'display:none' }}">
                    <label class="font-weight-bold">Detail Pengantaran <span class="text-danger">*</span></label>
                    <textarea name="detail_pengantaran" class="form-control @error('detail_pengantaran') is-invalid @enderror" rows="4" placeholder="Tulis detail pengntaran lengkap...">{{ old('detail_pengantaran', $transaksi->detail_pengantaran) }}</textarea>
                    @error('detail_pengantaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                        <option disabled value="">-- Pilih Metode Pengantaran --</option>                        
                        <option value="menunggu" {{ (old('status', $transaksi->status) == 'menunggu') ? 'selected' : '' }}>Menunggu</option>
                        <option value="diproses" {{ (old('status', $transaksi->status) == 'diproses') ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ (old('status', $transaksi->status) == 'selesai') ? 'selected' : '' }}>Selesai</option>
                        <option value="dibatalkan" {{ (old('status', $transaksi->status) == 'dibatalkan') ? 'selected' : '' }}>Dibatalkan</option>
                    </select>                    
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 

                <button type="submit" class="btn btn-warning">Update</button>
                <a href="/transaksi" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>
@endsection