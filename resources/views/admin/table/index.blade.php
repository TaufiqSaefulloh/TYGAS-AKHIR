@extends('admin.layout.app')
@section('title','table')
@section('content')
<section class="section">

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
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data User Terdaftar</h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr >
                                        <th>
                                            <b>N</b>ama
                                        </th>
                                        <th>Email </th>
                                        <th>Alamat</th>
                                        <th>Nomor Hp</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->alamat }}</td>
                                        <td>
                                            {{ $user->nomor_hp }} <br>
                                            <span><small><a href="https://wa.me/{{ $user->nomor_hp }}" target="_blank">Lanjutkan ke WhatsApp</a></small></span>
                                        </td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <!-- Tombol edit -->
                                            <a href="{{ route('table.edit', $user->id) }}" class="btn btn-primary mb-1">Edit</a>
                                            <!-- Tombol hapus -->
                                            <form action="{{ route('table.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>


    </main><!-- End #main -->


    @endsection