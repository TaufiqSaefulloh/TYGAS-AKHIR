@extends('admin.layout.app')
@section('title', 'Form Pertanyaan')
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
            <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('form-pertanyaan')}}">
                        <i class="bi bi-circle"></i><span>Form Pertanyaan</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('form-pendaftaran')}}" class="active">
                        <i class="bi bi-circle"></i><span>Form Pendaftaran</span>
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
    <h1>Form Pendaftaran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Form Pendaftaran</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Pendaftar</h5>

                <!-- Form untuk unduh data -->
                <form action="{{ route('pendaftaran.download') }}" method="GET">
                    <div class="row mb-3">
                        <label for="date" class="col-sm-2 col-form-label">Pilih Tanggal</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">Unduh Data</button>
                        </div>
                    </div>
                </form>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nama Pemilik Usaha</th>
                            <th scope="col">Email</th>
                            <th scope="col">NIK</th>
                            <th scope="col">No KK</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Pendidikan Terakhir</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Kelurahan/Desa</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Kabupaten/Kota</th>
                            <th scope="col">Jenis Produk</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $currentDate = null;
                        @endphp

                        @foreach($pendaftaran as $data)
                        @if ($currentDate != $data->created_at->format('Y-m-d'))
                        @php
                        $currentDate = $data->created_at->format('Y-m-d');
                        @endphp
                        <tr>
                            <td colspan="16" class="bg-light text-center fw-bold">
                                {{ \Carbon\Carbon::parse($currentDate)->format('d F Y') }}
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <td>{{ $data->nama_pemilik_usaha }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->no_kk }}</td>
                            <td>{{ $data->no_hp }}</td>
                            <td>{{ $data->tempat_lahir }}</td>
                            <td>{{ $data->tanggal_lahir }}</td>
                            <td>{{ $data->jenis_kelamin }}</td>
                            <td>{{ $data->pendidikan_terakhir }}</td>
                            <td>{{ $data->agama }}</td>
                            <td>{{ $data->kelurahan_desa }}</td>
                            <td>{{ $data->kecamatan }}</td>
                            <td>{{ $data->kabupaten_kota }}</td>
                            <td>{{ $data->jenis_produk }}</td>
                            <td>
                                <!-- Actions, e.g., Edit/Delete -->
                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
            </div>
        </div>
    </section>


</main><!-- End #main -->

@endsection