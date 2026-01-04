@extends('pengunjung.layout')
@section('hero')
        <div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url({{ asset('image/background.jpg') }}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
@endsection

@section('content')

        <!-- Contact Start -->
        <!-- Contact Start -->
        <div class="container-xxl py-5">
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
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Contact Us</h5>
                    <h1 class="mb-5">Contact For Any Query!!</h1>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4 text-center">
                                <h5 class="section-title ff-secondary fw-normal text-center text-primary">Order</h5>
                                <p><i class="fa fa-boxes text-primary me-2"></i>Website Rizkies Cheww</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <h5 class="section-title ff-secondary fw-normal text-center text-primary">General</h5>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>rizkiescheww@gmail.com</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <h5 class="section-title ff-secondary fw-normal text-center text-primary">Technical</h5>
                                <p><i class="fa fa-code text-primary me-2"></i>rijkania027@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4294.188149829!2d107.44212597534474!3d-6.538603293454219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690e68a1406c01%3A0xa66f34eb29c41198!2sUniversitas%20Pendidikan%20Indonesia%2C%20Kampus%20Purwakarta!5e1!3m2!1sid!2sid!4v1767325263825!5m2!1sid!2sid" 
                            frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"tabindex="0">
                        </iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form action="/inbox/store" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Name">
                                            <label for="name">Full Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Email">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
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
        </div>
        <!-- Contact End -->
        <!-- Contact End -->

@endsection