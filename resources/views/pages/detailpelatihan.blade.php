@extends('layout.app')
@section('title', 'Detail Pelatihan')
@section('content')

<div class=" set-breadcrumb " style="">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb m-2 ">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pelatihan') }}">Pelatihan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('detailpelatihan',$category_detail->id) }}">Detail Pelatihan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Video Pelatihan</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">

    <div class=" pt-3">
        <div class="row">
            <!-- Kolom Kiri (Video) -->
            <div class="col-12 col-md-8">
                <iframe width="100%" height="450" src="{{$category_detail->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <!-- Kolom Kanan (Card List Materi) -->
            <div class="col-12 col-md-4">
                <div class="card bg-white shadow-nav">
                    <div class="card-header">
                        Pelatihan {{$category_detail->judul}}
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="{{ route('materi', ['id' => $category_detail->id, 'materi' => 1]) }}">Materi Pelatihan 1</a></li>
                        <li class="list-group-item"><a href="{{ route('materi', ['id' => $category_detail->id, 'materi' => 2]) }}">Materi Pelatihan 2</a></li>
                        <li class="list-group-item"><a href="{{ route('materi', ['id' => $category_detail->id, 'materi' => 3]) }}">Materi Pelatihan 3</a></li>
                        <li class="list-group-item"><a href="{{ route('materi', ['id' => $category_detail->id, 'materi' => 4]) }}">Materi Pelatihan 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5 container">
    <div>

        <h3 class="fw-bold">{{ $category_detail->judul }}</h3>

        <p class="text-secondary">{{ $category_detail->deskripsi }}</p>

        <h5 class="fw-bold mt-5">Download File Materi</h5>
        @if($category_detail->file_pdf)
        <a href="{{ Storage::url($category_detail->file_pdf) }}" class="btn btn-fill-blue" download>Download</a>
        @else
        <p>File PDF tidak tersedia untuk diunduh.</p>
        @endif

    </div>

    <hr class="my-5 container">

    <div class="container my-5">
        <h2 class="fw-bold my-5">Rekomendasi <span class="text-blue">Pelatihan </span> Lainnya</h2>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                @foreach ($category_details as $item)
                <a href="" style="text-decoration: none" class="rounded-5 swiper-slide ">

                    <div class="card " style="width: 200px;">
                        <img src="{{ asset('assets/img/img-pelatihan1.png') }}" class="card-img-top" alt="..." width="100%">
                        <div class="card-body">

                            <h6 class="card-title fw-bold">{{ $item->judul }}
                            </h6>

                            <p class="card-text text-blue fs-7">{{ App\Models\Category::where('id', $item->id_kategori)->first()->judul }}</p>

                            <button href="" class="btn btn-fill-blue" style="width: 100%">Mulai</button>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

</div>
@endsection