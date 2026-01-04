@extends('layout.layout')
@section('admin')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rizkies Cheww Store🍪✨</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Ubah Password</h6>
            </div>

            @if (session('success'))
                <script>
                    Swal.fire({
                        title: "Berhasil",
                        text: "{{ session()->get('success') }}",
                        icon: "success"
                    });
                </script>
            @endif

            <div class="card-body">
                <form action="/admin/ubah_password/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="pw_lama">Password</label>
                    <input type="password" name="pw_lama" id="pw_lama" class="form-control @error('pw_lama') is-invalid @enderror" required>
                    @error('pw_lama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pw_new">Password Baru</label>
                    <input type="password" name="pw_new" id="pw_new" class="form-control @error('pw_new') is-invalid @enderror" required>
                    @error('pw_new')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="/dashboard" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>
@endsection