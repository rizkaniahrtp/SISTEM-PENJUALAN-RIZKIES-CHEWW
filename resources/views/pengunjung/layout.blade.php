<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rizkies Cheww</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    
    <!-- Favicon -->
    <link href="{{ asset('image/logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets2/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets2/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets2/css/style.css') }}" rel="stylesheet">

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!-- Navbar and Hero Start -->
    <div class="container-xxl bg-white p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="/" class="navbar-brand p-0">
                    <h2 class="text-primary m-0">
                        <img src="{{ asset('image/logo.png') }}" alt="Logo" class="me-3">Rizkies Cheww
                    </h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0 pe-4">
                        <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                        <a href="/about" class="nav-item nav-link {{ Request::is('about*') ? 'active' : '' }}">About</a>
                        <a href="/menu" class="nav-item nav-link {{ Request::is('menu*') ? 'active' : '' }}">Menu</a>                        
                        <a href="/contact" class="nav-item nav-link {{ Request::is('contact*') ? 'active' : '' }}">Contact</a>
                    </div>
                    
                    <div class="navbar-nav ms-auto d-flex align-items-center gap-0">
                        
                        <form action="/menu" method="get" class="d-flex ms-3">
                            <div class="input-group">
                                <input type="text" name="keywords" placeholder="Cari menu..." value="{{ request('keywords') }}" class="form-control bg-dark text-white border-warning" style="font-size: 12px;">
                                <button type="submit" class="btn btn-sm btn-warning text-dark px-3">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>    

                        <a href="/keranjang" class="nav-link text-white px-2">
                            <div class="position-relative">
                                <i class="bi bi-cart-fill"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.5rem; padding: 0.25em 0.4em;">
                                    {{ $keranjang->sum('jumlah') }}
                                </span>
                            </div>
                        </a>
                        
                        @auth
                        <div class="d-flex align-items-center gap-3">
                            
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link p-0 text-white" data-bs-toggle="dropdown">
                                    <i class="bi bi-gear-fill"></i> 
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-end shadow m-0">
                                    @if (Auth::user()->peran == 'admin')
                                    <a href="/admin/profil" class="dropdown-item text-warning py-2">
                                        <i class="far fa-user-circle text-primary"></i> Profil
                                    </a>
                                    <a href="/admin/ubah_password" class="dropdown-item text-warning py-2">
                                        <i class="fas fa-key text-warning"></i> Password
                                    </a>                                    
                                    @else    
                                    <a href="/profil" class="dropdown-item text-warning py-2">
                                        <i class="far fa-user-circle text-primary"></i> Profil
                                    </a>
                                    <a href="/password" class="dropdown-item text-warning py-2">
                                        <i class="fas fa-key text-warning"></i> Password
                                    </a>
                                    @endif
                                    <a href="/riwayat_transaksi" class="dropdown-item text-warning py-2">
                                        <i class="fas fa-history text-warning"></i> Riwayat Transaksi
                                    </a>
                                    <hr class="dropdown-divider"></li>
                                    <form action="/logout" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item py-2 text-danger fw-bold">
                                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="nav-item dropdown shadow m-0">
                                <a href="#" class="nav-link d-flex align-items-center p-0" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (Auth::user()->foto_profil)
                                    <img src="{{ asset('image/user/' . Auth::user()->foto_profil) }}" class="rounded-circle border" style="width: 35px; height: 35px; object-fit: cover;">
                                    @else
                                    <img src="{{ asset('image/foto-profil.jpg') }}" class="rounded-circle border border-2 border-light" style="width: 40px; height: 40px;">
                                    @endif
                                </a>
                                
                                <div class="dropdown-menu shadow border-0 p-3" style="margin-top: 12px; width: 260px; right: 0; left: auto;  z-index: 1055;">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="gap-2">
                                            <h6 class="mb-0 fw-bold text-dark">{{ Auth::user()->nama_user }}</h6>
                                            <small class="text-muted" style="font-size: 0.8rem;">{{ Auth::user()->email }}</small>
                                            <div class="mt-2 badge bg-primary">{{ Auth::user()->peran }} Rizkies Cheww</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @else
                        <div class="d-flex align-items-center gap-2 ms-3">
                            <a href="/login" class="btn btn-outline-warning btn-sm rounded-pill px-3 fw-bold">Sign In</a>
                            <a href="/register" class="btn btn-warning btn-sm rounded-pill px-3 fw-bold text-white">Sign Up</a>
                        </div>
                    @endauth
                        
                    </div>
                </div>
            </nav>
            
            @yield('hero')
        </div>
    </div>
        
        <!-- Navbar abd Hero End -->

        <!-- Service Start -->
        <!-- Service End -->

        <!-- About Start -->
        <!-- About End -->

        <!-- Product Start -->
        <!-- Product End -->

        <!-- Discount Start -->
        <!-- Discount End -->

        <!-- Message adn Maps Start -->
        <!-- Message -->

        <!-- Maps -->
        <!-- Message and Maps End -->

        <!-- Testimoni Start -->

        @yield('content')

        <!-- footer -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s" id="contact">
            <div class="container py-5">
                <div class="row g-5 text-center text-md-start">
                    <div class="col-lg-4 col-md-6">
                        <h4 class="section-title ff-secondary text-center text-primary fw-normal mb-4">Rizkies Cheww</h4>
                        <p>Sweet treats for your everyday moments</p>
                        <a class="btn btn-link" href="/about">About Us</a><br>
                        <a class="btn btn-link" href="/contact">Contact Us</a>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <h4 class="section-title ff-secondary text-center text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Purwakarta, Indonesia</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 831 3248 4576</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>rizkiescheww@gmail.com</p>
                    </div>
                    <div class="col-lg-4 col-md-6 text-md-end text-center">
                        <h4 class="section-title ff-secondary text-md-end text-center text-primary fw-normal mb-4">Operating Hours</h4>
                        <p>Weekdays 09.00 - 21.00 WIB</p>
                        <p>Weekends 10.00 - 21.00 WIB</p>
                    </div>
                </div>
            </div>
            <div class="container border-top py-3 text-center small">
                copyright &copy; Rizkies Cheww 2026.
            </div>
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
            <i class="bi bi-arrow-up"></i>
        </a>
    </div>
    <!-- Testimoni End -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets2/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets2/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets2/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets2/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets2/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets2/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets2/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets2/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src="{{ asset('assets2/js/main.js') }}"></script>
</body>

</html>