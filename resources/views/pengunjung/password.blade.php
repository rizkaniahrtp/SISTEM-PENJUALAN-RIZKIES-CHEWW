@extends('pengunjung.layout')

@section('hero')
        <div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url({{ asset('image/background.jpg') }}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Keamanan Akun</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Password</li>
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

                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        
                        <div class="bg-light rounded p-5 shadow-sm">
                            <div class="text-center mb-4">
                                <h4 class="text-primary section-title ff-secondary fw-normal">Ubah Password</h4>
                                <p class="text-muted mb-0">Gunakan password yang kuat.</p>
                            </div>

                            <form action="/password" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row g-3">
                                    
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control @error('pw_old') is-invalid @enderror" 
                                                id="pw_old" name="pw_old" placeholder="Password">
                                            <label for="pw_old">Password</label>
                                            @error('pw_old') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control @error('pw_new') is-invalid @enderror" 
                                                id="pw_new" name="pw_new" placeholder="Password Baru">
                                            <label for="pw_new">Password Baru</label>
                                            @error('pw_new') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" 
                                                id="pw_new_confirmation" name="pw_new_confirmation" placeholder="Ulangi Password">
                                            <label for="pw_new_confirmation">Ulangi Password Baru</label>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4 d-grid gap-2">
                                        <button class="btn btn-primary py-3" type="submit">Simpan</button>
                                        <a href="/" class="btn btn-outline-secondary py-3">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
