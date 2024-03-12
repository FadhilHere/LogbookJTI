<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeMarch">
    <!-- Favicon Icon -->
    <link rel="icon" href="{{ asset('CALTEX-RIAU-LOGO.png') }}">
    <!-- Site Title -->
    <title>silogbook</title>
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha384-rp5p/6u+HtYYeIwLthETeflCUdEcAl1z9vDZZQRHE8tvW6FQNK5IRG9e9GXs2QfP" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        h1 {
            font-weight: bold;
        }

        .fixed-size-img {
            width: 750px;
            height: 430px;
            border-radius: 15px;
        }

        /* Default styles for larger screens */
        @media (min-width: 768px) {


            .cs-hero_text {
                order: 1;
                /* margin-top: 55px; */
            }


        }

        /* Styles for smaller screens (e.g., mobile devices) */
        @media (max-width: 767px) {
            .cs-hero {
                flex-direction: column-reverse;
            }

            .cs-hero_text {
                order: 2;
                flex-direction: column-reverse;
                /* text-align: center; */
            }
        }
    </style>

</head>

<body>
    <div class="cs-preloader cs-white_bg cs-center" style="display: none;">
        <div class="cs-preloader_in" style="display: none;">
            <img src="{{ asset('assetsLanding/img/logo_mini.svg') }}" alt="Logo">
        </div>
    </div>

    <!-- Start Header Section -->
    <header class="cs-site_header cs-style1 cs-sticky-header cs-primary_color cs-white_bg">
        <div class="cs-main_header">
            <div class="container">
                <div class="cs-main_header_in">
                    <div class="cs-main_header_left">
                        <a class="cs-site_branding cs-accent_color" href="{{ url('/') }}">
                            <img src="{{ asset('Politeknik_Caltex_Riau.png') }}" alt="Logo"
                                style="width: 255px; height: auto;">
                        </a>
                    </div>
                    <!-- <div class="cs-main_header_center">

                    </div> -->
                    <div class="cs-main_header_right">
                        <a href="{{ route('login') }}" class="cs-toolbox">
                            <span class="cs-btn cs-color1"><span>Login</span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="home">
        <div class="cs-height_50 cs-height_lg_50"></div>
        <section class="cs-hero cs-style1 cs-bg" data-src="{{ asset('assetsLanding/img/hero_bg.svg') }}"
            style="background-image: url('{{ asset('assetsLanding/img/hero_bg.svg') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6" style="margin-top: 65px;">
                        <div class="cs-hero_text">
                            <h1>Sistem Pengisian Logbook JTI</h1>
                            <div class="cs-hero_subtitle">Silahkan mengisi logbook terlebih dahulu sebelum <br>
                                melakukan perkuliahan atau kegiatan</div>
                            <a href="{{ route('kuliah.create') }}" class="cs-btn"><i class="fas fa-school"></i><span>Log
                                    Perkuliahan</span></a>
                            <a href="{{ route('Lkegiatan.create') }}" class="cs-btn"><i
                                    class="fas fa-calendar-alt"></i><span>Log Kegiatan</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                    aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                                    aria-label="Slide 5"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                                    aria-label="Slide 6"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6"
                                    aria-label="Slide 7"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7"
                                    aria-label="Slide 8"></button>
                            </div>
                            <div class="carousel-inner" style="border-radius: 18px;">
                                <div class="carousel-item active">
                                    <img src="{{ asset('assetsLanding/img/slide/lab1.jpg') }}"
                                        class="d-block img-fluid object-fit-cover fixed-size-img" alt="..."
                                        style="width: 700px; border-radius: 18px;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assetsLanding/img/slide/lab2.jpg') }}"
                                        class="d-block img-fluid object-fit-cover fixed-size-img" alt="..."
                                        style="width: 700px; border-radius: 18px;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assetsLanding/img/slide/lab3.jpg') }}"
                                        class="d-block img-fluid object-fit-cover fixed-size-img" alt="..."
                                        style="width: 700px; border-radius: 18px;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assetsLanding/img/slide/lab4.jpg') }}"
                                        class="d-block img-fluid object-fit-cover fixed-size-img" alt="..."
                                        style="width: 700px; border-radius: 18px;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assetsLanding/img/slide/lab5.jpg') }}"
                                        class="d-block img-fluid object-fit-cover fixed-size-img" alt="..."
                                        style="width: 700px; border-radius: 18px;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assetsLanding/img/slide/lab6.jpg') }}"
                                        class="d-block img-fluid object-fit-cover fixed-size-img" alt="..."
                                        style="width: 700px; border-radius: 18px;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assetsLanding/img/slide/lab7.jpg') }}"
                                        class="d-block img-fluid object-fit-cover fixed-size-img" alt="..."
                                        style="width: 700px; border-radius: 18px;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assetsLanding/img/slide/lab8.jpg') }}"
                                        class="d-block img-fluid object-fit-cover fixed-size-img" alt="..."
                                        style="width: 700px; border-radius: 18px;">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cs-hero_shapes">
                <div class="cs-shape cs-shape_position1">
                    <img src="{{ asset('assetsLanding/img/shape/shape_1.svg') }}" alt="Shape">
                </div>
                <div class="cs-shape cs-shape_position2">
                    <img src="{{ asset('assetsLanding/img/shape/shape_2.svg') }}" alt="Shape">
                </div>
                <div class="cs-shape cs-shape_position3">
                    <img src="{{ asset('assetsLanding/img/shape/shape_3.svg') }}" alt="Shape">
                </div>
                <div class="cs-shape cs-shape_position4">
                    <img src="{{ asset('assetsLanding/img/shape/shape_4.svg') }}" alt="Shape">
                </div>
                <div class="cs-shape cs-shape_position5">
                    <img src="{{ asset('assetsLanding/img/shape/shape_5.svg') }}" alt="Shape">
                </div>
                <div class="cs-shape cs-shape_position6">
                    <img src="{{ asset('assetsLanding/img/shape/shape_6.svg') }}" alt="Shape">
                </div>
            </div>

        </section>
    </div>


    <section class="cs-bg" data-src="{{ asset('assetsLanding/img/feature_bg.svg') }}" id="pricing"
        style="background-image: url('{{ asset('assetsLanding/img/feature_bg.svg') }}');">
    </section>

    <!-- Script -->
    <script src="{{ asset('assetsLanding/js/plugins/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/plugins/jquery.slick.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/plugins/jquery.counter.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/plugins/wow.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1100
            });
        @elseif(session('error'))
        Swal.fire({
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 1100
        });
        @endif
    </script>

</body>

</html>

