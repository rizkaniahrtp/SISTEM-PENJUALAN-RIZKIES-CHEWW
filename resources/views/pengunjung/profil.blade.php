@extends('pengunjung.layout')

@section('hero')
        <div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url({{ asset('image/background.jpg') }}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Profil</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
@endsection

@section('content')
        <div class="container-xxl py-5">
            <div class="container">
                @if (session('success'))
                    <script>
                        Swal.fire({
                            title: "Berhasil",
                            text: "{{ session()->get('success') }}",
                            icon: "success"
                        });
                    </script>
                @endif

                @if (session('error'))
                    <script>
                        Swal.fire({
                            title: "Gagal",
                            text: "{{ session()->get('error') }}",
                            icon: "error"
                        });
                    </script>
                @endif

                <div class="row g-5 justify-content-center">
                    
                    <div class="col-lg-8">
                        <div class="bg-light rounded p-5 shadow-sm">
                            
                            <div class="text-center fw-normal mb-3">
                                <h4 class="section-title mb-0">Edit Profil</h4>
                            </div> 

                            <form action="/password" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row g-3">
                                    <div class="col-12 text-center mb-3">
                                        @if($user->foto_profil)
                                            <img src="{{ asset('image/user/' . $user->foto_profil) }}" class="rounded-circle shadow" style="width: 150px; height: 150px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('/image.foto-profil.jpg')}}" class="rounded-circle shadow" style="width: 150px; height: 150px;">
                                        @endif
                                        <div class="mt-3">
                                            <label for="foto" class="btn btn-sm btn-outline-primary" style="border-radius: 30px;">Ubah Foto</label>
                                            <input type="file" id="foto" name="foto_profil" class="d-none" onchange="this.form.submit()"> 
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('nama_user') is-invalid @enderror" 
                                                id="nama_user" name="nama_user" value="{{ old('nama_user', $user->nama_user) }}" placeholder="Nama Lengkap">
                                            <label for="nama_user">Nama Lengkap</label>
                                            @error('nama_user') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control bg-white" id="email" value="{{ $user->email }}" readonly disabled>
                                            <label for="email">Email</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" 
                                                id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" placeholder="Nomor HP">
                                            <label for="no_hp">No. Handphone</label>
                                            @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat Lengkap" id="alamat" name="alamat" style="height: 100px">{{ old('alamat', $user->alamat) }}</textarea>
                                            <label for="alamat">Alamat Lengkap</label>
                                            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4 d-grid gap-2">
                                        <button class="btn btn-primary py-3" type="submit">Simpan</button>
                                        <a href="/" class="btn btn-outline-secondary py-3">Kembali</a>
                                    </div>
                                    <div class="col-12 text-center mt-3">
                                        <a href="/password" class="text-muted small">Ubah password? Klik disini</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
