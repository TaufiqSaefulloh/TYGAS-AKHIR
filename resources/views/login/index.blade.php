@extends('layout.app')

@section('content')
<div class=" set-breadcrumb ">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb m-2 ">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Masuk</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">

    <div class="d-flex justify-content-center my-5">
        <div class="card p-5 shadow-nav rounded-4" style="width: 500px; border:none">

            <div class="text-center mb-5">
                <img src="{{ asset('assets/img/logo-lms.png') }}" alt="" style="width: 150px">
            </div>

            <form method="POST" action="{{ route('login.masuk') }}">
                @csrf
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                </div>

                <div class="mb-1">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <!-- Error handling -->
                @if($errors->any())
                <div class="alert alert-danger">
                    {{$errors->first()}}
                </div>
                @endif
                <div class="text-center my-3">
                    <button type="submit" class="btn btn-fill-blue" style="width: 100%">Masuk</button>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Tetap Masuk</label>
                    </div>

                    <p>
                        <a href="{{ route('password.request') }}" style="text-decoration: none" class="form-check text-dark">Lupa Kata Sandi?</a>
                    </p>
                </div>

                <div class="credits text-center mt-4">
                    Belum memiliki akun? <a href="{{ route('register.index') }}" style="text-decoration: none" class="text-blue">Daftar</a>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection