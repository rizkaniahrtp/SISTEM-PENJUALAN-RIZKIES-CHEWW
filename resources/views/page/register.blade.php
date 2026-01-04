<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rizkies Cheww - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-gradient-warning">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-nonee d-lg-block d-flex align-items-center justify-content-center">
                                <div class="p-5 text-center">
                                    <img src="{{ asset('image/logo.png') }}" style="width: 100%; max-width: 300px; height: auto;">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
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

                                    <form class="user" action="/register" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nama_user" name="nama_user"
                                                placeholder="Nama Lengkap" required>
                                            @error('nama_user') <small class="text-danger pl-3">{{ $message }}</small> @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name="email"
                                                placeholder="Alamat Email" required>
                                            @error('email') <small class="text-danger pl-3">{{ $message }}</small> @enderror
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                    id="password" name="password" placeholder="Password" required>
                                                @error('password') <small class="text-danger pl-3">{{ $message }}</small> @enderror
                                            </div>

                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                    id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-warning btn-user btn-block">
                                            Register
                                        </button>                                      
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/login">Sudah punya akun? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>
</html>