@extends('pengunjung.layout')

@section('hero')
        <!-- HERO START-->
        <div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url({{ asset('image/background.jpg') }}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <div class="container my-5 py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Cheww</h1>
                        <p class="text-white animated slideInLeft mb-4 pb-2">Di Rizkies Cheww Store, setiap gigitan punya cerita. Cookies chewy yang lumer di mulut, donat lembut dengan topping menggoda, croissant renyah berlapis dengan aroma butter yang khas, serta minuman yang bikin mood balik lagi. Dibuat dengan penuh rasa dan cinta, karena camilan enak selalu punya cara sendiri untuk bikin hari jadi lebih baik.</p>
                        <a href="/menu" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Order Now</a>
                    </div>
                    <div class="col-lg-5 text-center text-lg-end overflow-hidden">
                        <img class="img-fluid animated zoomIn" src="{{ asset('image/logo.png') }}" alt="Hero Image">
                    </div>
                </div>
            </div>
        </div>
        <!-- HERO END -->
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

        <!-- Product Start -->
        <div class="container-xxl py-5" id="menu">
            <div class="container">

                @if (session('success'))
                    <script>
                        Swal.fire({
                            title: "Berhasil",
                            text: "{{ session('success') }}",
                            icon: "success"
                        });
                    </script>
                @endif

                @if (session('error'))
                    <script>
                        Swal.fire({
                            title: "Gagal",
                            text: "{{ session('error') }}",
                            icon: "error"
                        });
                    </script>
                @endif
                
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our Menu</h5>
                    <h1 class="mb-5">Recommendation</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-4">
                        @foreach($recomend as $r)
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center p-3 border rounded shadow-sm">
                                <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('image/produk/' . $r->foto_produk) }}" alt="" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                        <span>{{ $r->nama_produk }}</span>
                                        <span class="text-primary">Rp {{ number_format($r->harga, 0, ',', '.') }}</span>
                                    </h5>
                                    <small class="fst-italic">{{ Str::limit($r->deskripsi, 70) }}</small>
                                    <div class="mt-2">
                                            <a href="/keranjang/tambah/{{ $r->id }}" class="btn btn-sm btn-primary rounded-pill py-1 px-3" style="font-size: 0.7rem;">
                                                <i class="bi bi-cart-fill"></i>
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center mt-5">
                    <a href="/menu" class="btn btn-primary py-3 px-5">Explore Our Menu</a>
                </div>
            </div>
        </div>
        <!-- Product End -->

        <!-- Discount Start -->
        <div class="container-xxl py-5" id="promo">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Discount</h5>
                    <h1 class="mb-5">Deal of The Day</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-4">
                        @foreach($promosi as $pr)
                        <div class="col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item h-100 align-items-center p-3 border rounded shadow-sm">
                                <div class="p-2 text-white">
                                    <i class="fa fa-2x fa-percentage mb-3 text-primary"></i>
                                    <h5>{{ $pr->nama_promosi }}</h5>
                                    <h2 class="text-primary">Min. Belanja Rp{{ number_format($pr->min_belanja, 0, ',', '.') }}</h2>
                                    <p class="text-primary">Diskon Rp{{ number_format($pr->diskon, 0, ',', '.' ) }}</p>
                                    <p class="text-primary">Berlaku: {{ \Carbon\Carbon::parse($pr->tanggal_mulai)->format('d M') }} - {{ \Carbon\Carbon::parse($pr->tanggal_selesai)->format('d M Y') }}</p>
                                    <a href="/menu" class="btn btn-primary btn-sm rounded-pill px-4">Order Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Discount End -->

        <!-- Message adn Maps Start -->
        <!-- Message -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s" id="contact">
            
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="position-relative h-100">
                        <iframe  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d17176.752602527227!2d107.4344226!3d-6.5386032!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690e68a1406c01%3A0xa66f34eb29c41198!2sUniversitas%20Pendidikan%20Indonesia%2C%20Kampus%20Purwakarta!5e1!3m2!1sid!2sid!4v1767224637532!5m2!1sid!2sid" 
                            class="position-absolute w-100 h-100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>                        
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <button type="button" class="btn btn-primary rounded-pill py-2 px-4 shadow" data-bs-toggle="modal" data-bs-target="#mapsModal">
                                <i class="bi-map me-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Contact Us</h5>
                        <h1 class="text-white mb-4">Contact For Any Query</h1>
                        
                        @if (session('success'))
                            <script>
                                Swal.fire({
                                    title: "Berhasil",
                                    text: "{{ session()->get('success') }}",
                                    icon: "success"
                                });
                            </script>
                        @endif

                        <form action="/inbox/store" method="POST">
                            @csrf 
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="nama" placeholder="Full Name" required>
                                        <label for="name">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Message" id="message" name="pesan" style="height: 100px" required></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Maps -->
        <div class="modal fade" id="mapsModal" tabindex="-1" aria-labelledby="mapsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-3 border-0 shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="mapsModalLabel">
                            <i class="fa fa-map-marker-alt me-2"></i>Location
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d17176.752602527227!2d107.4344226!3d-6.5386032!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690e68a1406c01%3A0xa66f34eb29c41198!2sUniversitas%20Pendidikan%20Indonesia%2C%20Kampus%20Purwakarta!5e1!3m2!1sid!2sid!4v1767224637532!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Close</button>
                        <a href="https://maps.app.goo.gl/NbS7LRAuHbVqQjBf8" target="_blank" class="btn btn-primary rounded-pill px-3">
                            Open in Google Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Message and Maps End -->

        <!-- Testimoni Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimoni</h5>
                    <h1 class="mb-5">What Our Customers Say</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    @foreach ($testimoni as $tm)
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>{{ $tm->pesan }}</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('image/user/' . $tm->user->foto_profil) }}" style="width: 50px; height: 50px; object-fit: cover;">
                            <div class="ps-3">
                                <h6 class="mb-1 text-dark">{{ $tm->user->nama_user }}</h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
        