@extends('layout.app')

@section('content')

{{-- breadcrumb --}}
<div class=" set-breadcrumb " style="">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb m-2 ">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bantuan</li>
            </ol>
        </nav>
    </div>
</div>


<div class="bg-f5">

    {{-- hero --}}
    <div class="container p-2">
        <div class="row my-5 align-items-center container">
            <div class="col d-block d-md-none">
                <img src="{{ asset('assets/img/hero-bantuan.png') }}" alt="" width="300px" class="d-block ms-auto">
            </div>

            <div class="col">
                <h1 class="fw-bold">Bantuan Mengenai Website <br> <span class="text-blue"> LMS PLUT-KUMKM </span></h1>
                <p> Halaman ini berisi beberapa pertanyaan yang sering ditanyakan atau sering disebut dengan Frequently
                    Asked Questions (FAQ). Temukan jawaban atas pertanyaan-pertanyaan umum Anda mengenai LMS PLUT-KUMKM.
                    Kami telah merangkum informasi yang berguna untuk membantu Anda memahami lebih baik tentang platform
                    ini dan cara memanfaatkannya untuk meningkatkan kemampuan dan keterampilan bisnis Anda. Jika Anda
                    memiliki pertanyaan tambahan, tim kami siap membantu Anda melalui kontak yang tersedia.</p>
                <a href="#pertanyaan" type="button" class="btn btn-fill-blue px-5 ">Lihat Selengkapnya<i class="ms-2 bi bi-arrow-right"></i></a>
            </div>

            <div class="col  d-none d-md-block">
                <img src="{{ asset('assets/img/hero-bantuan.png') }}" alt="" width="300px" class="d-block ms-auto">
            </div>
        </div>
    </div>
    {{-- end hero --}}

    <hr class="my-5" id="pertanyaan">

    {{-- list pertanyaan --}}

    <div class="container p-2 ">

        <div class="my-5 text-center">
            <h3 class="fw-bold mb-5">Pertanyaan Umum <br><span class="text-blue">Tentang LMS
                    PLUT-KUMKM</span></h3>
        </div>

        {{-- question row 1 --}}
        <div class="row mb-3">

            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <button class="btn btn-fill-blue" style="width: 100%" type="button" data-bs-toggle="collapse" data-bs-target="#row1" aria-expanded="false" aria-controls="row1">
                        Apa itu LMS PLUT-KUMKM?
                    </button>

                    <div class="collapse.show" id="row1">
                        <div class="card card-body " style="width: 100%">
                            Learning Management System Pusat Layananan Usaha Terpadu Koperasi dan Usaha Mikro, Kecil,
                            dan
                            Menengah
                            (LMS PLUT-KUMKM) merupakan website yang memberikan pelayanan kepada UMKM berupa
                            pelatihan-pelatihan
                            online secara gratis untuk meningkatkan kemampuan dan keterampilan para pelaku UMKM.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <button class="btn btn-fill-blue" style="width: 100%" type="button" data-bs-toggle="collapse" data-bs-target="#row1" aria-expanded="false" aria-controls="row1">
                        Bagaimana cara mendaftar dan memulai menggunakan platform ini?
                    </button>

                    <div class="collapse.show" id="row1">
                        <div class="card card-body " style="width: 100%">
                            Anda dapat mendaftar secara gratis dengan mengunjungi halaman pendaftaran di website kami
                            dan
                            mengisi formulir pendaftaran singkat. Setelah itu, Anda akan mendapatkan akses ke semua
                            fitur
                            platform dan dapat memulai pembelajaran Anda.
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- question row 2 --}}
        <div class="row mb-3">

            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <button class="btn btn-fill-blue" style="width: 100%" type="button" data-bs-toggle="collapse" data-bs-target="#row2" aria-expanded="false" aria-controls="row2">
                        Bagaimana cara mengatasi masalah teknis saat menggunakan LMS PLUT-KUMKM?
                    </button>

                    <div class="collapse" id="row2">
                        <div class="card card-body " style="width: 100%">
                            Pengguna dapat menghubungi dukungan teknis melalui formulir kontak yang disediakan di
                            website atau melalui email yang tersedia untuk mendapatkan bantuan dalam menyelesaikan
                            masalah teknis yang mereka hadapi.
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <button class="btn btn-fill-blue" style="width: 100%" type="button" data-bs-toggle="collapse" data-bs-target="#row3" aria-expanded="false" aria-controls="row2">
                        Bagaimana alur untuk mengakses pelatihan di website LMS PLUT-KUMKM?

                    </button>

                    <div class="collapse" id="row2">
                        <div class="card card-body " style="width: 100%">
                            Setelah login, pengguna dapat mengakses pelatihan dengan menavigasi ke halaman utama atau ke
                            menu "pelatihan". Dari sana, mereka dapat memilih pelatihan yang diminati dan mulai belajar.
                        </div>
                    </div>
                </div>
            </div>

        </div>


        {{-- question row 3 --}}
        <div class="row mb-3">

            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <button class="btn btn-fill-blue" style="width: 100%" type="button" data-bs-toggle="collapse" data-bs-target="#row3" aria-expanded="false" aria-controls="row3">
                        Apakah pelatihan yang disediakan berbayar?
                    </button>

                    <div class="collapse" id="row3">
                        <div class="card card-body " style="width: 100%">
                            Semua pelatihan yang tersedia bisa diakses secara gratis. Anda bisa mendapatkan materi
                            berupa video
                            dan soft file (jika memang ada) dari para konsultan di berbagai bidang yang ada di PLUT
                            KUMKM Jawa
                            Tengah
                        </div>
                    </div>
                </div>
            </div>

            {{-- question6 --}}
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <button class="btn btn-fill-blue" style="width: 100%" type="button" data-bs-toggle="collapse" data-bs-target="#row3" aria-expanded="false" aria-controls="row3">
                        Apakah ada fitur diskusi atau forum komunitas di LMS UMKM?
                    </button>

                    <div class="collapse" id="row3">
                        <div class="card card-body " style="width: 100%">
                            Untuk sekarang, fitur diskusi atau forum masih belum tersedia. Fitur ini masih mungkin
                            dikembangkan kedepannya, tetapi untuk sekarang fokus dari website ini masih kepada pemberian
                            video pelatihan untuk UMKM.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- question row 4 --}}
        <div class="row mb-3">

            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <button class="btn btn-fill-blue" style="width: 100%" type="button" data-bs-toggle="collapse" data-bs-target="#row4" aria-expanded="false" aria-controls="row4">
                        Apakah ada batasan waktu untuk mengakses materi pelatihan yang tersedia di website ini ?
                    </button>

                    <div class="collapse" id="row4">
                        <div class="card card-body " style="width: 100%">
                            Untuk saat ini, semua video pelatihan yang ada bisa diakses selamanya, tanpa durasi atau
                            waktu tenggat tertentu. Jadi pengguna bisa belajar melalui video pelatihan tanpa batasan,
                            menyesuaikan waktu yang ada untuk belajar.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <button class="btn btn-fill-blue" style="width: 100%" type="button" data-bs-toggle="collapse" data-bs-target="#row4" aria-expanded="false" aria-controls="row4">
                        Apakah ada sertifikasi yang diberikan setelah menyelesaikan kursus di LMS PLUT-KUMKM?
                    </button>

                    <div class="collapse" id="row4">
                        <div class="card card-body " style="width: 100%">
                            Saat ini, belum ada program sertifikasi yang tersedia setelah menyelesaikan kursus di LMS
                            UMKM. Namun, tim pengembang sedang mempertimbangkan untuk menyediakan program sertifikasi di
                            masa mendatang untuk meningkatkan nilai tambah bagi pengguna yang berhasil menyelesaikan
                            kursus dengan baik.
                        </div>
                    </div>
                </div>
            </div>


        </div>

        {{-- question row 5 --}}
        <div class="row mb-3">


            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <button class="btn btn-fill-blue" style="width: 100%" type="button" data-bs-toggle="collapse" data-bs-target="#row5" aria-expanded="false" aria-controls="row5">
                        Apakah ada panduan atau tutorial yang tersedia untuk membantu pengguna baru mengenal fitur-fitur
                        website ini?
                    </button>

                    <div class="collapse" id="row5">
                        <div class="card card-body " style="width: 100%">
                            Ya, kami menyediakan panduan lengkap dan tutorial interaktif yang mudah diakses untuk
                            membantu pengguna baru dalam mengenal fitur-fitur LMS UMKM. Panduan tersebut mencakup
                            langkah-langkah mulai dari pendaftaran akun hingga navigasi dalam platform, mengakses
                            kursus, dan memanfaatkan berbagai fitur yang tersedia. Anda dapat menemukan panduan ini di
                            bagian Bantuan atau FAQ di website kami, serta kami juga mengirimkan panduan tersebut kepada
                            pengguna baru melalui email setelah mereka mendaftar. Panduan ini dirancang untuk memastikan
                            pengguna dapat memanfaatkan LMS UMKM secara maksimal untuk kebutuhan belajar dan
                            pengembangan mereka.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <button class="btn btn-fill-blue" style="width: 100%" type="button" data-bs-toggle="collapse" data-bs-target="#row5" aria-expanded="false" aria-controls="row5">
                        Apakah ada program loyalitas atau insentif untuk mendorong pengguna untuk terus menggunakan
                        platform?
                    </button>

                    <div class="collapse" id="row5">
                        <div class="card card-body " style="width: 100%">
                            Saat ini, kami belum memiliki program loyalitas atau insentif resmi yang ditawarkan kepada
                            pengguna untuk mendorong mereka terus menggunakan platform. Namun, kami selalu terbuka
                            terhadap saran dan masukan dari pengguna mengenai jenis insentif atau program yang mereka
                            harapkan. Kami berkomitmen untuk terus meningkatkan pengalaman pengguna dan memberikan nilai
                            tambah bagi komunitas kami. Jika Anda memiliki ide atau saran mengenai program loyalitas
                            atau insentif yang ingin Anda lihat di platform kami, kami sangat menghargai kontribusi Anda
                            dan siap untuk mempertimbangkan hal tersebut untuk pengembangan masa depan. Terima kasih
                            atas dukungan dan partisipasi Anda dalam memperbaiki platform kami.
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    {{-- end list pertanyaan --}}
    <hr class="my-5">

    <div class="container">

        <div class="text-center">
            <h2 class="fw-bold mb-3">Punya Pertanyaan Lain Tentang <span class="text-blue">LMS PLUT-KUMKM?</span></h2>
            <p>Jika pertanyaan anda tidak terjawab di atas, anda bisa mengirimkan pertanyaan melalui form dibawah.
                <br>Kami akan memeriksanya dan menjawab dalam waktu maksimal 2 hari kerja melalui email yang anda
                berikan.
                Pastikan untuk memeriksa email anda secara berkala.
            </p>
        </div>

        <div class="d-flex justify-content-center my-5">
            <div class="card py-3 px-5 " style="width: 500px">
                <h5 class="fw-bold text-center mt-3 mb-5">Form Pengajuan Pertanyaan</h5>
                <form method="POST" action="{{ route('store') }}" id="myform">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="pertanyaan" class="form-label">Pertanyaan</label>
                        <textarea type="text" class="form-control" id="pertanyaan" name="pertanyaan" style="height: 80px"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-fill-blue" style="width: 100%">Kirim</button>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.getElementById("myform").addEventListener("submit", function(event) {
                event.preventDefault(); // Menghentikan pengiriman formulir agar kita dapat menampilkan popup terlebih dahulu

                var nama = document.getElementById("nama").value;
                var email = document.getElementById("email").value;
                var pertanyaan = document.getElementById("pertanyaan").value;

                if (nama === "" || email === "" || pertanyaan === "") {
                    // Menampilkan pesan gagal jika ada input yang masih kosong
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Mohon lengkapi semua inputan!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    // Menampilkan pesan berhasil jika formulir lengkap
                    Swal.fire({
                        title: 'Terimakasih!',
                        text: 'Formulir telah terkirim!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Setelah popup ditutup, lanjutkan pengiriman formulir
                        if (result.isConfirmed) {
                            document.getElementById("myform").submit();
                        }
                    });
                }
            });
        </script>

    </div>
</div>