@extends('admin.layout.app')
@section('title','User')
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
            <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('table.index')}}" class="active">
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
            <h1>Tables Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">User Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit User</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('table.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-3">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ $user->nomor_hp }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="alamat" name="alamat">{{ $user->alamat }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $user->pekerjaan }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="nama_usaha" class="col-sm-2 col-form-label">Nama Usaha</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" value="{{ $user->nama_usaha }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="tentang" class="col-sm-2 col-form-label">Tentang</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="tentang" name="tentang">{{ $user->tentang }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-sm-10 offset-sm-2">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    </main><!-- End #main -->


@endsection