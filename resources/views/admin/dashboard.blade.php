@extends('admin.layout.app')
@section('title', 'Dashboard Admin')
@section('content')

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard.index')}}">
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
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Pertanyaan Masuk</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-question-lg"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $form -> count() }}</h6>
                    <span class="text-success small pt-1 fw-bold">Pertanyaan</span>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Total Pengguna</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $totalUsers }}</h6>
                    <span class="text-success small pt-1 fw-bold">Pengguna Umum : {{ $umumUsers }}</span>
                    <span class="text-primary small pt-1 fw-bold">Pelaku UMKM: {{ $umkmUsers }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Customers Card -->



          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Kategori</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-tags"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $categories->count() }}</h6>
                    <span class="text-success small pt-1 fw-bold">Kategori Pelatihan</span>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->


          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Event</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-calendar2-event"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $event->count() }} </h6>
                    <span class="text-success small pt-1 fw-bold">Kegiatan</span>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->


          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Konsultan</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-video3"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $team->count() }}</h6>
                    <span class="text-success small pt-1 fw-bold">Orang</span>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->


          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Pelatihan</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-youtube"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $category_detail->count() }}</h6>
                    <span class="text-success small pt-1 fw-bold">Video</span>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <!-- <div class="col-lg-4">

      </div> -->
      <!-- End Right side columns -->

    </div>
  </section>
</main><!-- End #main -->

@endsection