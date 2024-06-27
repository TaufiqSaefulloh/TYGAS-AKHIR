@extends('layout.app')

@section('content')
<div>

    <div class=" set-breadcrumb " style="">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb m-2 ">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- hero tentang kami  --}}
    <div class="container my-3">
        <div class="row my-4 pt-5 align-items-center container">
            <div class="col d-block d-md-none">
                <img src="{{ asset('assets/img/hero-about.png') }}" alt="" width="350px" class="d-block ms-auto">
            </div>

            <div class="col-7">
                <h1 class="fw-bold">Tentang Kami, <br> <span class="text-blue">LMS PLUT-KUMKM</span> </h1>
                <p> Lebih paham dan mengerti apa itu LMS PLUT-KUMKM, visi misi, serta para konsultan yang ada untuk
                    memberikan bimbingan dan pengembangan UMKM </p>
                <a href="#deskripsi" type="button" class="btn btn-fill-blue px-5 ">Lihat Selengkapnya<i class="ms-2 bi bi-arrow-right"></i></a>
            </div>

            <div class="col  d-none d-md-block">
                <img src="{{ asset('assets/img/hero-about.png') }}" alt="" width="300px" class="d-block ms-auto">
            </div>
        </div>
    </div>
    {{-- end hero tentang kami  --}}

    <hr class="container my-5" id="deskripsi">

    {{-- deskripsi plut-kumkm --}}

    <div class="container my-5 pt-5">
        <div class="text-center mb-5">
            <h3 class="fw-bold mb-5">Apa itu <span class="text-blue">LMS PLUT-KUMKM?</span> </h3>
            <img src="{{ asset('assets/img/logo-lms.png') }}" alt="" width="300px" class="my-3">
        </div>

        <div>
            <h6>Learning Management System Pusat Layananan Usaha Terpadu Koperasi dan Usaha Mikro, Kecil, dan Menengah
                (LMS
                PLUT-KUMKM) merupakan website yang memberikan pelayanan kepada UMKM berupa pelatihan-pelatihan online
                secara
                gratis untuk meningkatkan kemampuan dan keterampilan para pelaku UMKM.</h6>

            <h6>
                LMS PLUT-KUMKM Jawa Tengah tidak hanya memberikan akses ke pelatihan online gratis, tetapi juga
                menyediakan
                beragam materi yang relevan dengan kebutuhan UMKM di wilayah tersebut. Dengan cakupan yang luas,
                platform
                ini menyediakan modul-modul pelatihan yang mencakup berbagai aspek, mulai dari manajemen usaha,
                pemasaran
                online, hingga peningkatan kualitas produk. Para pelaku UMKM di Jawa Tengah dapat mengakses
                materi-materi
                berkualitas tinggi dan mendapatkan pembelajaran yang sesuai dengan perkembangan terkini dalam dunia
                bisnis,
                sehingga mereka dapat terus berkembang dan bersaing secara lebih efektif di pasar yang semakin
                kompetitif.
            </h6>

        </div>

    </div>

    {{-- akhir deskripsi plut-kumkm --}}

    <hr class="container my-5">

    {{-- tim konsultan --}}

    <div class="container my-5">

        <div>
            <h3 class="text-center fw-bold mb-5">Tim Konsultan <span class="text-blue">PLUT-KUMKM</span> Jawa Tengah
            </h3>
        </div>

        <div class="d-flex justify-content-center gap-3 flex-wrap ">

            @if($teams->isEmpty())
            <div class="text-center">Maaf, tidak ada data tim yang tersedia saat ini.</div>
            @else
            @foreach ($teams as $team)
            <div class="card bg-blue text-white" style="width: 200px;">
                <img src="{{ Storage::url('public/teams/'.$team->image) }}" class="card-img-top" alt="{{$team->nama}}" style="width: 185px; height: 150px">
                <div class="card-body text-center">
                    <h6 class="card-title fw-bold">{{ $team->nama }}</h6>
                    <p class="card-text fw-light">{{ $team->bidang }}</p>
                </div>
            </div>
            @endforeach
            @endif


        </div>

    </div>

    {{-- end tim konsultan --}}

</div>
@endsection