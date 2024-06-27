@extends('layout.app')

@section('content')
<div class="bg-f5">
    {{-- hero --}}
    <div class="container my-5 py-2">
        <div class="row my-5 pt-5 align-items-center container">
            <div class="col d-block d-md-none">
                <img src="{{ asset('assets/img/hero-beranda.png') }}" alt="" width="350px" class="d-block ms-auto">
            </div>

            <div class="col">
                <h1 class="fw-bold">Tingkatkan <span class="text-blue">Pengetahuan</span> Sukseskan <span class="text-blue">UMKM</span> </h1>
                <p> Melalui platform pembelajaran daring kami, kami menyediakan akses ke beragam kursus dan sumber daya
                    yang
                    dirancang khusus untuk meningkatkan kompetensi dan keberhasilan bisnis Anda.Temukan potensi Anda,
                    tingkatkan kompetensi, mulai perjalanan menuju kemajuan dan keberhasilan bisnis Anda!</p>
                <a href="{{ route('pelatihan') }}" type="button" class="btn btn-fill-blue px-5 ">Mulai Pelatihan
                    Sekarang<i class="ms-2 bi bi-arrow-right"></i></a>
            </div>

            <div class="col  d-none d-md-block">
                <img src="{{ asset('assets/img/hero-beranda.png') }}" alt="" width="300px" class="d-block ms-auto">
            </div>
        </div>
    </div>
    {{-- end hero --}}

    <hr class="my-5">

    {{-- section kategori --}}
    <div class="my-5 container pt-2">

        <div class="text-center my-3 ">
            <h2 class="fw-bold"> Berbagai Kategori <span class="text-blue"> Pelatihan yang Tersedia </span> </h2>
            <p>Disini anda akan menemukan berbagai kategori pelatihan yang disesuaikan dengan kebutuhan dan keahlian
                konsultan. <br> Temukan kategori yang paling sesuai dan tingkatkan kemampuan anda untuk meraih
                kesuksesan
                dalam dunia UMKM.
            </p>
        </div>

        <div class="d-flex justify-content-center gap-3 flex-wrap " id="kategori">

            @if($categories->isEmpty())
            <div class="alert alert-warning" role="alert">
                Tidak ada kategori yang tersedia saat ini.
            </div>
            @else
            @foreach($categories as $category)
            <a href="{{ route('detailkategori', $category->id) }}" style="text-decoration: none" class="rounded-4">
                <div class="card p-1 text-center" style="width: 330px; height:100%">
                    <img src="{{ Storage::url('public/categories/'.$category->image) }}" class="card-img-top" alt="{{ $category->judul }}" width="250px"> 
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

    <hr class="my-5">

    {{-- section mengapa  --}}
    <div class="my-5 container pt-5">
        <h2 class="text-center fw-bold mb-5">Mengapa Perlu Pelatihan di <span class="text-blue"> LMS PLUT-KUMKM?
            </span> </h2>

        <div class="row align-items-center">

            <div class="col">
                <img src="{{ asset('assets/img/hero-mengapa.png') }}" alt="" width="380px" class="d-block m-auto">
            </div>

            <div class="col">

                <div class="card p-1 mb-2 bg-blue text-white" style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">1. Meningkatkan Pengetahuan dan Keterampilan </h5>
                        <p class="card-text fw-light">Pelatihan di LMS UMKM memberikan kesempatan untuk
                            memperoleh pengetahuan baru dan mengasah keterampilan yang diperlukan dalam menjalankan
                            bisnis, seperti manajemen, pemasaran, dan keuangan.</p>
                    </div>
                </div>

                <div class="card p-1 mb-2 bg-blue text-white" style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">2. Meningkatkan Daya Saing </h5>
                        <p class="card-text fw-light">Dengan memiliki pengetahuan dan keterampilan yang lebih
                            baik, UMKM dapat meningkatkan daya saing mereka dalam pasar yang semakin kompetitif,
                            sehingga dapat bertahan dan berkembang dalam jangka panjang.</p>
                    </div>
                </div>

                <div class="card p-1 mb-2 bg-blue text-white" style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">3. Mengakses Sumber Daya dan Informasi </h5>
                        <p class="card-text fw-light">LMS menyediakan akses mudah ke sumber daya dan informasi
                            yang berguna, seperti materi pelatihan yang dapat membantu UMKM untuk meningkatkan
                            pengetahuan dan keterampilan mereka secara mandiri dan berkala.</p>
                    </div>
                </div>

                <div class="card p-1 mb-2 bg-blue text-white" style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">4. Mengembangkan Potensi Bisnis </h5>
                        <p class="card-text fw-light">Dengan terus belajar dan mengembangkan diri melalui
                            pelatihan, UMKM dapat mengoptimalkan potensi bisnis mereka dan meraih kesuksesan yang lebih
                            besar di pasar yang terus berubah dan berkembang.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- end section mengapa --}}

    {{-- section tunggu --}}
    <div class="bg-blue">
        <div class="container">
            <div class="row my-4 align-items-center container py-5">
                <div class="col d-block d-md-none">
                    <img src="{{ asset('assets/img/hero-tunggu.png') }}" alt="" width="350px" class="d-block ms-auto">
                </div>

                <div class="col">
                    <h1 class="fw-bold text-white">Ayo, Tunggu Apalagi?</h1>
                    <p class="text-white"> Daftarkan dirimu, dan mulai pelatihan di LMS PLUT-KUMKM sekarang juga! Ayo
                        Tingkatkan
                        Pengetahuan, dan Sukseskan UMKM bersama PLUT Jawa Tengah.</p>
                    <a href="{{ route('pelatihan') }}" type="button" class="btn btn-outline-blue px-5 ">Mulai
                        Pelatihan Sekarang<i class="ms-2 bi bi-arrow-right"></i></a>
                </div>

                <div class="col  d-none d-md-block">
                    <img src="{{ asset('assets/img/hero-tunggu.png') }}" alt="" width="350px" class="d-block ms-auto">
                </div>
            </div>
        </div>
    </div>
    {{-- end section tunggu --}}


    {{-- section Bantuan --}}

    <div class="container my-5">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Pertanyaan Tentang <span class="text-blue">LMS PLUT-KUMKM</span></h2>
        </div>

        <div class="mb-3">
            <button class="btn btn-fill-blue" style="width: 100%" type="button" data-bs-toggle="collapse" data-bs-target="#question1" aria-expanded="false" aria-controls="question1">
                Apa itu LMS PLUT-KUMKM?
            </button>

            <div class="collapse" id="question1">
                <div class="card card-body">
                    Learning Management System Pusat Layananan Usaha Terpadu Koperasi dan Usaha Mikro, Kecil, dan
                    Menengah
                    (LMS PLUT-KUMKM) merupakan website yang memberikan pelayanan kepada UMKM berupa pelatihan-pelatihan
                    online secara gratis untuk meningkatkan kemampuan dan keterampilan para pelaku UMKM.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <button class="btn btn-fill-blue" style="width: 100%" type="button" data-bs-toggle="collapse" data-bs-target="#question2" aria-expanded="false" aria-controls="question2">
                Bagaimana cara mendaftar dan memulai menggunakan platform ini?
            </button>

            <div class="collapse" id="question2">
                <div class="card card-body">
                    Anda dapat mendaftar secara gratis dengan mengunjungi halaman pendaftaran di website kami dan
                    mengisi formulir pendaftaran singkat. Setelah itu, Anda akan mendapatkan akses ke semua fitur
                    platform dan dapat memulai pembelajaran Anda.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <button class="btn btn-fill-blue" style="width: 100%" type="button" data-bs-toggle="collapse" data-bs-target="#question3" aria-expanded="false" aria-controls="question3">
                Apakah pelatihan yang disediakan berbayar?
            </button>

            <div class="collapse" id="question3">
                <div class="card card-body">
                    Semua pelatihan yang tersedia bisa diakses secara gratis. Anda bisa mendapatkan materi berupa video
                    dan soft file (jika memang ada) dari para konsultan di berbagai bidang yang ada di PLUT KUMKM Jawa
                    Tengah
                </div>
            </div>
        </div>

        <div class="text-center my-5">
            <h5 class="fw-bold mb-3">Belum menemukan pertanyaan yang sesuai?</h5>
            <a href="{{ route('bantuan') }}" type="button" class="btn btn-outline-blue px-5"> Lihat pertanyaan
                lainnya <i class="bi bi-chevron-right"></i> </a>
        </div>

    </div>

    {{-- end section bantuan --}}

</div>
@endsection