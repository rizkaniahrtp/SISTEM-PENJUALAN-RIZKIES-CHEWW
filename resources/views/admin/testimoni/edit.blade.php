@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Edit Testimoni Rizkies Cheww</h6>
            </div>

            <div class="card-body">
                <form action="/testimoni/update/{{ $testimoni->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama User</label>
                    <select name="user_id" class="form-control">
                        @foreach($user as $u)
                        <option value="{{ $u->id }}" {{ $testimoni->user_id == $u->id ? 'selected' : '' }}>
                            {{ $u->nama_user }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Pesan</label>
                    <textarea name="pesan" class="form-control @error('pesan') is-invalid @enderror" required>{{ old('pesan', $testimoni->pesan) }}</textarea>
                    @error('pesan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Gambar</label>
                    <div class="mb-2">
                        <img src="{{ asset('image/testimoni/'.$testimoni->gambar) }}" width="100" class="img-thumbnail">
                    </div>
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar" id="gambar">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                 <div class="mb-3">
                    <label>Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                        <option selected disabled>-- Pilih Status --</option>
                        <option value="menunggu" {{ old('status', $testimoni->status) == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="disetujui" {{ old('status', $testimoni->status) == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="diarsipkan" {{ old('status', $testimoni->status) == 'diarsipkan' ? 'selected' : '' }}>Diarsipkan</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
                <a href="/testimoni" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>
@endsection