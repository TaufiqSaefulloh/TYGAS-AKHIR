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
                    <a href="{{route('form-pertanyaan')}}" class="active">
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
    <h1>Form Pertanyaan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Form Pertanyaan</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="seCtion">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pertanyaan Masuk</h5>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Pertanyaan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($forms as $form)
                        <tr>
                            <th scope="row">{{ $form->id }}</th>
                            <td>{{ $form->nama }}</td>
                            <td>{{ $form->email }}</td>
                            <td>{{ $form->pertanyaan }}</td>
                            <td>{{ $form->created_at }}</td>
                            <td>
                                <a href="mailto:{{ $form->email }}?subject=Balasan%20untuk%20pertanyaan%20Anda&body={{ urlencode($form->pertanyaan) }}" class="btn btn-primary">Balas</a>
                                <form action="{{ route('forms.destroy', $form->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
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