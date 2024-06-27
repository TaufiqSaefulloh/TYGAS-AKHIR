@extends('layout.app')
@section('title','Admin Login')
@section('content')
<main>
    <section class="section register mt-5 mb-5 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div>
                        <a class="navbar-brand me-auto" href="#">
                            <img src="{{ asset('assets/img/logo-lms.png') }}" alt="" width="100px">
                        </a>
                    </div><!-- End Logo -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Admin</h5>
                                <p class="text-center small">Enter your username & password to login</p>
                            </div>
                            <form method="POST" action="{{ route('login.masuk') }}">
                                @csrf
                                <div class="mb-1">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-1">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>

                                <div class="text-center my-3">
                                    <button type="submit" class="btn btn-fill-blue" style="width: 100%">Masuk</button>
                                </div>

                                <!-- Error handling -->
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    {{$errors->first()}}
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                    <div class="credits">
                        Bukan Admin? <a href="{{ route('beranda') }}">Kembali Ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection