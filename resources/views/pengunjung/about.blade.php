@extends('pengunjung.layout')

@section('hero')
        <div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url({{ asset('image/background.jpg') }}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
@endsection

@section('content')

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x bi-gem text-primary mb-4"></i>
                                <h5>Premium Ingredients</h5>
                                <p>Dibuat dari bahan-bahan berkualitas tinggi dan segar.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x bi-cart-check text-primary mb-4"></i>
                                <h5>Easy Ordering</h5>
                                <p>Pemesanan cepat dan aman, siap antar ke tempatmu.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x bi-star text-primary mb-4"></i>
                                <h5>Winning Taste</h5>
                                <p>Varian rasa yang bikin kamu nggak bisa berhenti ngunyah!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x bi-heart text-primary mb-4"></i>
                                <h5>Made With Love</h5>
                                <p>Dibuat dengan sepenuh hati untuk kepuasan pelanggan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

        <!-- About Start -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('image/tentang2.png') }}">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('image/tentang1.jpg') }}" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('image/tentang4.jpg') }}">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('image/tentang3.jpeg') }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to <i class="fa fa-cookie-bite text-primary me-2"></i>Rizkies Cheww</h1>
                        <p class="mb-4" style="text-align: justify;">Rizkies Cheww Store hadir untuk menemani momen-momen kecil yang berarti. Kami menyediakan cookies chewy, donat lembut, croissant renyah berlapis, serta minuman kopi dan non-kopi favorit yang cocok dinikmati kapan saja.</p>
                        <p class="mb-4" style="text-align: justify;">Dengan bahan berkualitas dan proses yang kami jaga dengan sepenuh hati, setiap produk dibuat untuk memberikan rasa nyaman dan menyenangkan. Bagi kami, camilan bukan hanya soal rasa, tetapi juga tentang kebersamaan, cerita, dan suasana hangat yang tercipta di setiap gigitan.</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">
                                        {{ $total_kategori }}
                                    </h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Total</p>
                                        <h6 class="text-uppercase mb-0">Category</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">
                                        {{ $total_produk }}
                                    </h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Total</p>
                                        <h6 class="text-uppercase mb-0">Products</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

@endsection