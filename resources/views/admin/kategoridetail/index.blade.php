@extends('admin.layout.app')
@section('title','Detail Category')
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
                        <i class="bi bi-circle"></i><span>Kategori Pelatihan</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('event.index')}}">
                        <i class="bi bi-circle"></i><span>Event</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('kategoridetail.index')}}" class="active">
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
        <h1>Detail Kategori Pelatihan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Detail Kategori Pelatihan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section category">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('kategoridetail.create') }}" type="button" class="btn btn-success mb-3">TAMBAH</a>
        </div>
        <div class="container py-5">
            @foreach($kategoridetails->groupBy('id_kategori') as $kategoriId => $kategoridetails)
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="fw-bold">{{ App\Models\Category::find($kategoriId)->judul }}</h4>
                </div>
            </div>
            <div class="row">
                @foreach($kategoridetails as $kategoridetail)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body p-0">
                            <iframe width="100%" height="200" src="{{$kategoridetail->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                        <div class="card-footer bg-white p-3">
                            <h5 class="card-title fw-bold">{{ $kategoridetail->judul }}</h5>
                            <p class="card-text text-blue fs-7">{{ $category[$kategoriId] }}</p>
                            <p class="card-text fw-light">{{ $kategoridetail->deskripsi }}</p>
                            <a href="{{ route('kategoridetail.edit', $kategoridetail->id) }}" type="button" class="btn btn-primary mb-3">EDIT</a>
                            <form action="{{ route('kategoridetail.destroy', $kategoridetail->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this detail?')">DELETE</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>

</main><!-- End #main -->

@endsection