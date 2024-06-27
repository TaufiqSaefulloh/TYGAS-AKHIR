@extends('layout.app')

@section('content')
<div class=" set-breadcrumb " style="">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb m-2 ">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pelatihan') }}">Pelatihan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kategori</li>
            </ol>
        </nav>
    </div>
</div>



<div class="my-5 container pt-5 align-items-center">
    <div class="row align-items-center">

        <div class="col-4">
            <img src="{{ Storage::url('public/categories/'.$category->image) }}" alt="{{ $category->judul }}" width="300px" class="d-block m-auto">
        </div>

        <div class="col">
            <h1 class="fw-bold">{{ $category->judul }}</h1>
            <p class="fw-light">{{ $category->deskripsi }}</p>
            <h4 class="text-blue"> {{ $category_detail->count() }} Video Pelatihan</h4>
        </div>
    </div>

</div>

<hr class="my-5 container">

<div class="container my-5">
    <h2 class="fw-bold my-5">Video <span class="text-blue">Pelatihan </span></h2>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($category_detail as $kategoridetail)
            <a href="{{ Auth::check() ? route('detailpelatihan', $kategoridetail->id) : '#' }}" data-needs-login="{{ Auth::check() ? 'false' : 'true' }}" style="text-decoration: none" class="rounded-5 swiper-slide">
                <div class="card" style="width: 200px;">
                    <iframe width="100%" height="315" src="{{$kategoridetail->video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="true" controls="0" style="pointer-events: none;"></iframe>
                    <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $kategoridetail->judul }}</h6>
                        <p class="card-text text-blue fs-7">{{ $category->judul }}</p>
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
                    showLoginPopup(link.getAttribute('href'));
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
                    window.location.href ="{{ route('login.index') }}";
                }
            });
        }
    </script>


</div>

@endsection