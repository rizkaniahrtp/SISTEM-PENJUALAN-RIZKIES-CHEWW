@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Tambah Transaksi Rizkies Cheww</h6>
            </div>

            <div class="card-body">
                <form action="/transaksi/tambah/" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Nama Pembeli</label>
                    <select name="user_id" class="form-select" required>
                    <option disabled value="">-- Pilih Pembeli --</option>
                        @foreach($user as $u)
                            <option value="{{ $u->id }}">{{ $u->nama_user }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Nama Promosi</label>
                    <select name="promosi_id" class="form-select">
                        <option value="">-- Pilih Promo --</option>
                        @foreach($promosi as $p)
                            <option value="{{ $p->id }}">
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
                    <input type="number" name="subtotal" class="form-control @error('subtotal') is-invalid @enderror" min="0" value="{{ old('subtotal') }}">
                    @error('subtotal')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>                

                <div class="mb-3">
                    <label>Metode Pengantaran</label>
                    <select class="form-select @error('metode_pengantaran') is-invalid @enderror" name="metode_pengantaran" required>
                        <option disabled value="">-- Pilih Metode Pengantaran --</option>                        
                        <option value="diambil" {{ (old('metode_pengantaran') == 'diambil') ? 'selected' : '' }}>Ambil di tempat</option>
                        <option value="diantar" {{ (old('metode_pengantaran') == 'diantar') ? 'selected' : '' }}>Diantar ke tempat</option>
                    </select>                    
                    @error('metode_pengantaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>    
                
                <div class="mb-3">
                    <label>Detail Pengantaran</label>
                    <input type="text" name="detail_pengantaran" placeholder="isi dengan - bila ambil di tempat" class="form-control @error('detail_pengantaran') is-invalid @enderror" value="{{ old('detail_pengantaran') }}" required>
                    @error('detail_pengantaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                        <option disabled value="">-- Pilih Status --</option>                        
                        <option value="menunggu" {{ (old('status') == 'menunggu') ? 'selected' : '' }}>Menunggu</option>
                        <option value="diproses" {{ (old('status') == 'diproses') ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ (old('status') == 'selesai') ? 'selected' : '' }}>Selesai</option>
                        <option value="dibatalkan" {{ (old('status') == 'dibatalkan') ? 'selected' : '' }}>Dibatalkan</option>
                    </select>                    
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 

                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="/transaksi" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>
@endsection