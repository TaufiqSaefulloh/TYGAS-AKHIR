@extends('admin.layout.app')
@section('title','Event')
@section('content')

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('dashboard.index')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('form-pertanyaan')}}">
                        <i class="bi bi-circle"></i><span>Form Pertanyaan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('table.index')}}">
                        <i class="bi bi-circle"></i><span>Tables User</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Kategori</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('category.index')}}">
                        <i class="bi bi-circle"></i><span>Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('event.index')}}" class="active">
                        <i class="bi bi-circle"></i><span>Event</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('kategoridetail.index')}}">
                        <i class="bi bi-circle"></i><span>Detail Kategori</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('team.index')}}">
                <i class="bi bi-person"></i>
                <span>Team Konsultan</span>
            </a>
        </li><!-- End Teams Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('contact.index')}}">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->
    </ul>

</aside><!-- End Sidebar-->


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Event</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Kategori</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section event">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('event.create') }}" type="button" class="btn btn-success mb-3">TAMBAH EVENT</a>
        </div>
        <div class="d-flex justify-content-center gap-3 flex-wrap my-5 " id="kategori">

            @foreach($events as $event)


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
                    <a href="{{ route('event.edit', ['event' => $event->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-1">Delete</button>
                    </form>
                </div>

            @endforeach

        </div>
    </section>

</main><!-- End #main -->

@endsection