@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Edit Promosi Rizkies Cheww</h6>
            </div>

            <div class="card-body">
                <form action="/promosi/update/{{ $promosi->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Kode Promo</label>
                    <input type="text" name="kode_promo" class="form-control @error('kode_promo') is-invalid @enderror" value="{{ old('kode_promo', $promosi->kode_promo) }}" required>
                    @error('kode_promo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Nama Promosi</label>
                    <input type="text" name="nama_promosi" class="form-control @error('nama_promosi') is-invalid @enderror" value="{{ old('nama_promosi', $promosi->nama_promosi) }}" required>
                    @error('nama_promo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Diskon</label>
                    <input type="number" name="diskon" class="form-control @error('diskon') is-invalid @enderror" value="{{ old('diskon', $promosi->diskon) }}" required>
                    @error('diskon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Minimal Belanja</label>
                    <input type="min_belanja" name="min_belanja" class="form-control @error('min_belanja') is-invalid @enderror" value="{{ old('min_belanja', $promosi->min_belanja) }}" required>
                    @error('min_belanja')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai', $promosi->tanggal_mulai) }}" required>
                    @error('tanggal_mulai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="{{ old('tanggal_selesai', $promosi->tanggal_selesai) }}" required>
                    @error('tanggal_selesai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                        <option selected disabled>-- Pilih Status --</option>
                        <option value="aktif" {{ old('status', $promosi->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status', $promosi->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
                <a href="/promosi" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>
@endsection