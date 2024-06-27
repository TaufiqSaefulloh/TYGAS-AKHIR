@extends('layout.app')

@section('content')
    <div class=" set-breadcrumb " style="">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb m-2 ">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('event') }}">Event</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Event</li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="container">
        <div class="my-5 container">
            <h2 class="fw-bold mb-4">Detail <span class="text-blue"> Event </span> </h2>

            <div class="row align-items-center">

                <div class="col-12 col-md-4">
                    <img src="{{ Storage::url('public/events/'.$event->image) }}" alt="{{ $event->judul }}" width="320px"
                        class="d-block me-auto">
                </div>

                <div class="col-12 col-md-8">
                    <h2 class="fw-bold">{{ $event->judul }}</h2>

                    <div class="my-3">

                        <h5 class="fw-bold mb-3">Detail Informasi</h5>

                        <p class="card-text fs-5 fw-normal mb-0">
                            <i class="text-blue bi bi-calendar-fill me-1"></i> Hari, Tanggal :
                            <span class="fw-bold text-blue"> {{ $event->tanggal }}</span>
                        </p>

                        <p class="card-text fs-5 fw-normal mb-0 ">
                            <i class="text-blue bi bi-clock-fill custom-icon"></i>Waktu :
                            <span class="fw-bold text-blue"> {{ $event->waktu }} </span>
                        </p>
                        <p class="card-text fs-5 fw-normal mb-0">
                            <i class="text-blue bi bi-geo-alt-fill custom-icon"></i>Lokasi :
                            <span class="fw-bold text-blue"> {{ $event->lokasi }} </span>
                        </p>

                        <h5 class="fw-bold mt-4 mb-2">Link Pendaftaran</h5>
                        <a href="{{$event->link_pendaftaran}}" target="_blank" type="button" class="btn btn-fill-blue px-5 ">Daftar Event Sekarang</a>

                    </div>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <h3 class="fw-bold my-4">Deskripsi <span class="text-blue">Event</span></h3>

        <div class="px-3">

            <div class="row rounded-4 pt-3 px-2 shadow-black  my-3" style="background-color:#FFFFFF">
                <h5 class="fw-bold"> Tentang Event </h5>
                <p class="fw-normal">{{ $event->tentang }}</p>
            </div>

            <div class="row rounded-4 pt-3 px-2 shadow-black  my-3" style="background-color:#FFFFFF">
                <h5 class="fw-bold "> Hal Yang Akan Dipelajari</h5>
                <p class="fw-normal">
                <ul class="px-4 ">
                    <p class="fw-normal">{{ $event->hal }}</p>
                </ul>

                </p>
            </div>

            <div class="row rounded-4 pt-3 px-2 shadow-black  my-3" style="background-color:#FFFFFF">
                <h5 class="fw-bold"> Narasumber</h5>
                <p class="fw-normal">
                <ul class="px-4">
                <p class="fw-normal">{{ $event->narasumber }}</p>
                    
                </ul>

                </p>
            </div>

            <div class="row rounded-4 pt-3 px-2 shadow-black  my-3" style="background-color:#FFFFFF">
                <h5 class="fw-bold"> Syarat Pendaftaran</h5>
                <p class="fw-normal">
                <ul class="px-4">
                <p class="fw-normal">{{ $event->syarat }}</p>

                </ul>
                </p>
            </div>

            <div class="row rounded-4 pt-3 px-2 shadow-black  my-3" style="background-color:#FFFFFF">
                <h5 class="fw-bold"> Cara Mendaftar</h5>
                <p class="fw-normal">
                    Untuk mendaftar, klik link berikut : <a rel="stylesheet" href="{{ $event->link_pendaftaran }}">Link Pendaftaran </a>   atau hubungi CP - Devi di nomor +62 896-0680-0003.
                    <br> Pastikan untuk mendaftarkan diri Anda sebelum kuota peserta terpenuhi.
                </p>
            </div>

            <div class="row rounded-4 pt-3 px-2 shadow-black  my-3" style="background-color:#FFFFFF">
                <h5 class="fw-bold"> Biaya Event</h5>
                <p class="fw-normal">
                {{ $event->biaya }}
                </p>
            </div>



        </div>
    </div>
@endsection