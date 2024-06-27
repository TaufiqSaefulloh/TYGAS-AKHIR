@extends('layout.app')
@section('title','Pendaftaran')
@section('content')

<div class=" set-breadcrumb ">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb m-2 ">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar</li>
            </ol>
        </nav>
    </div>
</div>

<div class="d-flex justify-content-center my-5">
    <div class="card p-5 shadow-nav rounded-4" style="width: 450px; border:none">

        <div class="text-center mb-5">
            <img src="{{ asset('assets/img/logo-lms.png') }}" alt="" style="width: 150px">
        </div>

        <form method="POST" action="{{route('register.store')}}">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pengguna" class="form-label">Kategori</label>
                <select class="form-control @error('pengguna') is-invalid @enderror" id="pengguna" name="pengguna" required>
                    <option value="" disabled selected>Pilih Pengguna</option>
                    <option value="Umum" {{ old('pengguna') == 'Umum' ? 'selected' : '' }}>Umum</option>
                    <option value="Pelaku UMKM" {{ old('pengguna') == 'Pelaku UMKM' ? 'selected' : '' }}>Pelaku UMKM</option>
                </select>
                @error('pengguna')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Nomor Handphone</label>
                <input type="number" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}">
                @error('nomor_hp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Masukkan Ulang Kata Sandi</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-fill-blue" style="width: 100%">Daftar</button>
            </div>

            <div class="credits text-center mt-4">
                Sudah memiliki akun? <a href="{{ route('login.index') }}" style="text-decoration: none" class="text-blue">Masuk</a>
            </div>

        </form>
    </div>
</div>
@endsection