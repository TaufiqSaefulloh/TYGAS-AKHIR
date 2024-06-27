@extends('admin.layout.app')
@section('title', 'Tim Konsultan')
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
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Kategori</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('category.index')}}">
                        <i class="bi bi-circle"></i><span>Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('event.index')}}">
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
            <a class="nav-link " href="{{route('team.index')}}">
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
        <h1>Konsultan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Tim Konsultan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section teams">

        {{-- tim konsultan --}}

        <div class="container my-5">

            <div>
                <h3 class="text-center fw-bold mb-5">Tim Konsultan <span class="text-blue">PLUT-KUMKM</span> Jawa Tengah
                </h3>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('team.create') }}" type="button" class="btn btn-success mb-3">TAMBAH TEAM</a>
            </div>

            <div class="d-flex justify-content-center gap-3 flex-wrap ">
                @foreach ($teams as $team)
                <div class="card bg-blue text-dark" style="width: 200px;">
                    <img src="{{ Storage::url('public/teams/'.$team->image) }}" class="card-img-top" style="width: 185px; height: 150px" alt="{{$team->nama}}">
                    <div class="card-body text-center">
                        <h6 class="card-title fw-bold">{{ $team->nama }}</h6>
                        <p class="card-text fw-light">{{ $team->bidang }}</p>
                        <a href="{{ route('team.edit', $team->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('team.destroy', $team->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

        {{-- end tim konsultan --}}
    </section>
</main><!-- End #main -->


@endsection