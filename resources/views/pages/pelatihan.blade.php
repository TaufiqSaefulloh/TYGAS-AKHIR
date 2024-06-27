@extends('layout.app')

@section('content')

<div class=" set-breadcrumb " style="">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb m-2 ">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pelatihan</li>
            </ol>
        </nav>
    </div>
</div>



<div>
    {{-- hero --}}
    <div class="container my-5 py-2">
        <div class="row pt-5 align-items-center container">
            <div class="col d-block d-md-none">
                <img src="{{ asset('assets/img/hero-pelatihan.png') }}" alt="" width="300px" class="d-block ms-auto">
            </div>

            <div class="col">
                <h1 class="fw-bold">Temukan <span class="text-blue">Potensi </span> Anda <br>Melalui<span class="text-blue"> Pelatihan</span> Kami </h1>
                <p> Dapatkan keunggulan kompetitif dengan mengikuti pelatihan kami yang dirancang khusus untuk UMKM.
                    Tingkatkan pengetahuan, keterampilan, dan jaringan anda untuk mengembangkan UMKM anda dengan sukses
                </p>
                <a href="#listKategori" type="button" class="btn btn-fill-blue px-5 ">Mulai Pelatihan Sekarang<i class="ms-2 bi bi-arrow-right"></i></a>
            </div>

            <div class="col  d-none d-md-block">
                <img src="{{ asset('assets/img/hero-pelatihan.png') }}" alt="" width="300px" class="d-block ms-auto">
            </div>
        </div>
    </div>
    {{-- end hero --}}

    <hr class="container my-3" id="listKategori">

    {{-- section kategori --}}
    <div class="my-5 container pt-2">

        <div class="text-center my-3 ">
            <h2 class="fw-bold mb-3">Kategori <span class="text-blue"> Pelatihan yang Tersedia </span> </h2>
            <p>Disini anda akan menemukan berbagai kategori pelatihan yang disesuaikan dengan kebutuhan dan keahlian
                konsultan. <br> Temukan kategori yang paling sesuai dan tingkatkan kemampuan anda untuk meraih
                kesuksesan
                dalam dunia UMKM.
            </p>
        </div>

        <div class="d-flex justify-content-center gap-3 flex-wrap mt-5 " id="kategori">

            @if($categories->isEmpty())
            <div class="alert alert-warning" role="alert">
                Tidak ada kategori yang tersedia saat ini.
            </div>
            @else
            @foreach($categories as $category)
            <a href="{{ route('detailkategori', $category->id) }}" style="text-decoration: none" class="rounded-4">
                <div class="card p-1 text-center" style="width: 330px; height:100%">
                    <img src="{{ Storage::url('public/categories/'.$category->image) }}" class="card-img-top" alt="..." width="250px">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $category->judul }}</h5>
                        <p class="card-text fw-light">{{ $category->deskripsi }}</p>
                    </div>
                </div>
            </a>
            @endforeach
            @endif

        </div>

    </div>
    {{-- end section kategori --}}

    <hr class="container my-5">

    <div class="container my-5">
        <h3 class="fw-bold mb-5">Rekomendasi <span class="text-blue">Pelatihan </span></h3>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($category_detail as $rekomendasi)
                <a href="{{ Auth::check() ? route('detailpelatihan', $rekomendasi->id) : '#' }}" data-needs-login="{{ Auth::check() ? 'false' : 'true' }}" style="text-decoration: none" class="rounded-5 swiper-slide">
                    <div class="card" style="width: 200px;">
                        <iframe width="100%" height="315" src="{{ $rekomendasi->video }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="true" controls="0" style="pointer-events: none;"></iframe>
                        <div class="card-body">
                            <h6 class="card-title fw-bold">{{ $rekomendasi->judul }}</h6>
                            <p class="card-text text-blue fs-7">{{ App\Models\Category::where('id', $rekomendasi->id_kategori)->first()->judul }}</p>
                            <button class="btn btn-fill-blue" style="width: 100%">Mulai</button>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div style="" class="swiper-pagination mt-5"></div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const links = document.querySelectorAll('a[data-needs-login="true"]');

                links.forEach(link => {
                    link.addEventListener('click', function(event) {
                        event.preventDefault();
                        showLoginPopup();
                    });
                });
            });

            function showLoginPopup() {
                Swal.fire({
                    title: 'Belum Login!',
                    text: 'Anda harus login terlebih dahulu untuk mengakses detail pelatihan.',
                    icon: 'info',
                    confirmButtonText: 'OK',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('login.index') }}";
                    }
                });
            }
        </script>

    </div>



</div>