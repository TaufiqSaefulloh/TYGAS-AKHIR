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
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
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
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('contact.index')}}">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li><!-- End Error 404 Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Event</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Event</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section contact">
        <div class="card p-4">
            <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Image Upload</label>
                    <input class="form-control" type="file" name="image" id="image">
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Lengkap</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>

                <div class="mb-3">
                    <label for="waktu" class="form-label">Jam</label>
                    <input type="text" class="form-control" id="waktu" name="waktu">
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi">
                </div>

                <div class="mb-3">
                    <label for="link_pendaftaran" class="form-label">Link Pendaftaran</label>
                    <input type="text" class="form-control" id="link_pendaftaran" name="link_pendaftaran">
                </div>

                <div class="mb-3">
                    <label for="tentang" class="form-label">Deskripsi Event</label>
                    <textarea type="text" class="form-control" id="tentang" name="tentang" style="height: 150px;"></textarea>
                </div>

                <div class="mb-3">
                    <label for="hal" class="form-label">Hal Yang Dipelajari</label>
                    <textarea type="text" class="form-control" id="hal" name="hal" style="height: 150px;"></textarea>
                </div>

                <div class="mb-3">
                    <label for="narasumber" class="form-label">Narasumber</label>
                    <textarea type="text" class="form-control" id="narasumber" name="narasumber" style="height: 100px;"></textarea>
                </div>

                <div class="mb-3">
                    <label for="syarat" class="form-label">Syarat Pendaftaran</label>
                    <textarea type="text" class="form-control" id="syarat" name="syarat" style="height: 150px;"></textarea>
                </div>

                <div class="mb-3">
                    <label for="biaya" class="form-label">Biaya</label>
                    <textarea type="text" class="form-control" id="biaya" name="biaya" style="height: 100px;"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary" style="width: 100%">Tambahkan</button>
                </div>
            </form>
        </div>

    </section>

</main><!-- End #main -->

@endsection