@extends('layout.app')

@section('content')

<div class=" set-breadcrumb " style="">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb m-2 ">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Event</li>
            </ol>
        </nav>
    </div>
</div>

    {{-- hero --}}
    <div class="container ">
        <div class="row my-4 pt-5 align-items-center container">
            <div class="col d-block d-md-none">
                <img src="{{ asset('assets/img/hero-event.png') }}" alt="" width="350px" class="d-block ms-auto">
            </div>

            <div class="col">
                <h1 class="fw-bold">Event Offline <span class="text-blue">PLUT KUMKM</span> </h1>
                <p> PLUT-KUMKM menyediakan pelatihan offline untuk UMKM di Banyumas. Ikuti kegiatan pelatihan langsung kami
                    dan dapatkan pengetahuan serta keterampilan bisnis dari narasumber berpengalaman.. Manfaatkan kesempatan
                    ini untuk mengembangkan usaha Anda dengan dukungan penuh dari PLUT-KUMKM.</p>
                <a href="#listEvent" type="button" class="btn btn-fill-blue px-5 ">Lihat Selengkapnya<i
                        class="ms-2 bi bi-arrow-right"></i></a>
            </div>

            <div class="col d-none d-md-block ">
                <img src="{{ asset('assets/img/hero-event.png') }}" alt="" width="300px" class="d-block ms-auto">
            </div>
        </div>
    </div>
    {{-- end hero --}}

    <hr class="container my-5" id="listEvent">


    {{-- card --}}

    <div class="container">
        <div class="text-center my-5">
            <h2 class="fw-bold my-3"> Jadwal Pelatihan <span class="text-blue">Offline</span> </h2>
            <p class="text-secondary">Berikut Agenda Pelatihan Offline yang Tersedia. Pastikan melihat dan membaca detail
                baik kegiatan <br> maupun cara
                pendaftaran yang sudah tertera pada detail informasi pelatihan offline</p>
        </div>

        <div class="d-flex justify-content-center gap-3 flex-wrap my-5 " id="kategori">
        @if($events->isEmpty())
    <div class="text-center">Maaf, tidak ada data acara yang tersedia saat ini.</div>
@else
    @foreach($events as $event)
        <a href="{{ route('detailevent', $event->id) }}" style="text-decoration: none" class="rounded-4">
            <div class="card p-2" style="width: 250px; height:100%">
                <img src="{{ Storage::url('public/events/'.$event->image) }}" style="background-size: cover; width: 100%; height:200px;" class="card-img-top" alt="Event-image" width="250px">
                <div class="card-body py-3 px-2">
                    <h6 class="card-title fw-bold truncate-two-lines">{{ $event->judul }}</h6>
                    <div>
                        <p class="card-text fs-8 fw-normal mb-0"><i class="text-blue bi bi-calendar-fill me-2"></i>{{ $event->tanggal }}</p>
                        <p class="card-text fs-8 fw-normal mb-0"><i class="text-blue bi bi-clock-fill me-2"></i>{{ $event->waktu }}</p>
                        <p class="card-text fs-8 fw-normal mb-0"><i class="text-blue bi bi-geo-alt-fill me-2"></i>{{ $event->lokasi }}</p>
                    </div>
                </div>
                <a href="{{ route('detailevent',$event->id) }}" class="btn btn-fill-blue fs-8" style="width: 100%">Detail Informasi</a>
            </div>
        </a>
    @endforeach
@endif

           
        </div>


    </div>
@endsection