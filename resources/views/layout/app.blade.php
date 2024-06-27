<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LMS PLUT-KUMKM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="icon" href="{{ asset('assets/img/logo2.png') }}" type="image/x-icon">
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-nav w-100 fixed-top">
        <div class="container d-flex align-items-center">
            <div>
                <a class="navbar-brand me-auto" href="{{ route('beranda') }}">
                    <img src="{{ asset('assets/img/logo-lms.png') }}" alt="" width="100px">
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-auto mb-0 mb-lg-0 d-flex justify-content-center">

                    <li class="nav-item {{ $active == 'beranda' ? 'borderBottom' : '' }} ">
                        <a class="nav-link {{ $active == 'beranda' ? 'text-blue' : '' }} " aria-current="page" href="/beranda">Beranda</a>
                    </li>

                    <li class="nav-item {{ $active == 'pelatihan' ? 'borderBottom' : '' }}">
                        <a class="nav-link {{ $active == 'pelatihan' ? 'text-blue' : '' }}" href="{{ route('pelatihan') }}">Pelatihan</a>
                    </li>

                    <li class="nav-item {{ $active == 'tentangkami' ? 'borderBottom' : '' }} ">
                        <a class="nav-link {{ $active == 'tentangkami' ? 'text-blue' : '' }}" href="{{ route('tentangkami') }}">Tentang Kami</a>
                    </li>

                    <li class="nav-item {{ $active == 'bantuan' ? 'borderBottom' : '' }}">
                        <a class="nav-link {{ $active == 'bantuan' ? 'text-blue' : '' }}" href="{{ route('bantuan') }}">Bantuan</a>
                    </li>

                    <li class="nav-item {{ $active == 'event' ? 'borderBottom' : '' }}">
                        <a class="nav-link {{ $active == 'event' ? 'text-blue' : '' }}" href="{{ route('event') }}">Event</a>
                    </li>

                </ul>

                <div class="d-flex gap-3">
                    @if(auth()->check())
                    <div class="dropdown">
                        <div class="dropdown-toggle d-flex gap-3 align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(auth()->user()->profile_image)
                            <div class="" style="background-image : url('{{ asset(Auth::user()->profile_image) }}'); background-position: center; background-size: cover; width: 30px; height:30px; border-radius:50%">

                            </div>
                            <!-- <img src="{{ asset(Auth::user()->profile_image) }}" alt="Profile Picture" width="30" class="rounded-circle me-1"> -->
                            @else
                            <i class="bi bi-person-circle me-1"></i>
                            @endif
                            {{ auth()->user()->nama }} <!-- Menampilkan nama pengguna -->
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('profil') }}">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a class="btn btn-fill-blue" href="{{ route('register.index') }}" type="submit">Daftar</a>
                    <a class="btn btn-outline-blue" href="{{ route('login.index') }}" type="submit">Masuk</a>
                    @endif
                </div>



            </div>
        </div>
    </nav>


    @yield('content')

    <div class="bg-white shadow-nav">

        <div class="container mb-0">
            <div class="row py-5 px-2">
                <div class="col-12 col-md-5">
                    <img src="{{ asset('assets/img/logo-lms.png') }}" alt="" width="150px">
                    <p class="fs-7 mt-2"> Learning Management System Pusat Layananan Usaha Terpadu Koperasi dan Usaha
                        Mikro, Kecil, dan Menengah (LMS PLUT-KUMKM) merupakan website yang memberikan pelayanan kepada
                        UMKM berupa pelatihan-pelatihan online secara gratis untuk meningkatkan kemampuan dan
                        keterampilan para pelaku UMKM.</p>
                </div>

                <div class="col">
                    <h5> <b>Menu</b> </h5>
                    <ul class="list-unstyled align-items-start">
                        <a class="text-decoration-none text-dark" href="{{ route('beranda') }}">
                            <li>Beranda</li>
                        </a>

                        <a class="text-decoration-none text-dark" href="{{ route('pelatihan') }}">
                            <li>Pelatihan</li>
                        </a>

                        <a class="text-decoration-none text-dark" href="{{ route('tentangkami') }}">
                            <li>Tentang Kami</li>
                        </a>

                        <a class="text-decoration-none text-dark" href="{{ route('bantuan') }}">
                            <li>Bantuan</li>
                        </a>
                    </ul>
                </div>

                <div class="col-4">
                    <h5><b>Kontak Kami</b></h5>
                    <ul class="list-unstyled align-items-start">
                        @if(count($contacts) > 0)
                        @foreach($contacts as $contact)
                        <li><i class="bi bi-envelope me-2"></i>{{ $contact->email }}</li>
                        @endforeach
                        @else
                        <li>
                            <div class="alert alert-warning">Kontak tidak tersedia.</div>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="col">
                    <h5><b>Ikuti Kami</b></h5>
                    @if(count($contacts) > 0)
                    @foreach($contacts as $contact)
                    <a class="text-decoration-none" href="{{ $contact->instagram }}" target="_blank"><i class="bi bi-instagram me-3"></i></a>
                    <a class="text-decoration-none" href="{{ $contact->facebook }}" target="_blank"><i class="bi bi-facebook me-3"></i></a>
                    @endforeach
                    @else
                    <div class="alert alert-warning">Tidak ada akun media sosial yang tersedia.</div>
                    @endif
                </div>


            </div>
        </div>

        <div class="bg-blue py-3">
            <h6 class="text-center text-light" style="font-size: 12px">
                <i class="bi bi-c-circle"></i> 2024 LMS PLUT-KUMKM I All Rights Reserved
            </h6>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 5,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                // Ketika lebar layar lebih kecil dari atau sama dengan 768px
                1024: {
                    slidesPerView: 5, // Mengatur jumlah slides menjadi 3
                    spaceBetween: 10, // Mengatur ruang antara slides menjadi 5px
                },
                768: {
                    slidesPerView: 3, // Mengatur jumlah slides menjadi 3
                    spaceBetween: 5, // Mengatur ruang antara slides menjadi 5px
                },
                640: {
                    slidesPerView: 2, // Mengatur jumlah slides menjadi 3
                    spaceBetween: 5, // Mengatur ruang antara slides menjadi 5px
                },
                320: {
                    slidesPerView: 1, // Mengatur banyak slide menjadi 1
                    spaceBetween: 5, // Mengatur ruang antara slides menjadi 5px
                },
            },
        });
    </script>
</body>

</html>