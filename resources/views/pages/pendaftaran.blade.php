@extends('layout.app')
@section('content')

<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            margin: 70px auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container .form-group label {
            font-weight: bold;
        }

        .form-container .form-control {
            border-radius: 5px;
        }

        .form-container .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
        }

        .form-container .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .margin {
            padding: 50px;
        }
    </style>
</head>


<div class="margin">
    <div class="form-container">
        <h2>Form Pendaftaran</h2>
        <form method="POST" action="{{ route('store') }}">
            @csrf
            <div class="row">
                <!-- Kolom pertama -->
                <div class="col-md-6">
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Nama Pemilik Usaha -->
                    <div class="form-group">
                        <label for="nama_pemilik_usaha">Nama Pemilik Usaha <span class="text-danger">*</span></label>
                        <input type="text" id="nama_pemilik_usaha" name="nama_pemilik_usaha" class="form-control @error('nama_pemilik_usaha') is-invalid @enderror" value="{{ old('nama_pemilik_usaha') }}" required>
                        @error('nama_pemilik_usaha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div class="form-group">
                        <label for="nik">NIK <span class="text-danger">*</span></label>
                        <input type="text" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" required>
                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- No KK -->
                    <div class="form-group">
                        <label for="no_kk">No KK <span class="text-danger">*</span></label>
                        <input type="text" id="no_kk" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror" value="{{ old('no_kk') }}" required>
                        @error('no_kk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- No Hp -->
                    <div class="form-group">
                        <label for="no_hp">No Hp <span class="text-danger">*</span></label>
                        <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" required>
                        @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Tempat Lahir -->
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') }}" required>
                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- Jenis Kelamin -->
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" @if(old('jenis_kelamin')=='Laki-laki' ) selected @endif>Laki-laki</option>
                            <option value="Perempuan" @if(old('jenis_kelamin')=='Perempuan' ) selected @endif>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- Pendidikan Terakhir -->
                    <div class="form-group">
                        <label for="pendidikan_terakhir">Pendidikan Terakhir <span class="text-danger">*</span></label>
                        <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" value="{{ old('pendidikan_terakhir') }}" required>
                        @error('pendidikan_terakhir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- Kolom kedua -->
                <div class="col-md-6">

                    <!-- Agama -->
                    <div class="form-group">
                        <label for="agama">Agama <span class="text-danger">*</span></label>
                        <input type="text" id="agama" name="agama" class="form-control @error('agama') is-invalid @enderror" value="{{ old('agama') }}" required>
                        @error('agama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Kelurahan/Desa -->
                    <div class="form-group">
                        <label for="kelurahan_desa">Kelurahan/Desa <span class="text-danger">*</span></label>
                        <input type="text" id="kelurahan_desa" name="kelurahan_desa" class="form-control @error('kelurahan_desa') is-invalid @enderror" value="{{ old('kelurahan_desa') }}" required>
                        @error('kelurahan_desa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Kecamatan -->
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan <span class="text-danger">*</span></label>
                        <input type="text" id="kecamatan" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" value="{{ old('kecamatan') }}" required>
                        @error('kecamatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Kabupaten/Kota -->
                    <div class="form-group">
                        <label for="kabupaten_kota">Kabupaten/Kota <span class="text-danger">*</span></label>
                        <input type="text" id="kabupaten_kota" name="kabupaten_kota" class="form-control @error('kabupaten_kota') is-invalid @enderror" value="{{ old('kabupaten_kota') }}" required>
                        @error('kabupaten_kota')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Jenis Produk -->
                    <div class="form-group">
                        <label for="jenis_produk">Jenis Produk <span class="text-danger">*</span></label>
                        <input type="text" id="jenis_produk" name="jenis_produk" class="form-control @error('jenis_produk') is-invalid @enderror" value="{{ old('jenis_produk') }}" required>
                        @error('jenis_produk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary w-100">Daftar</button>
            </div>
        </form>
    </div>
</div>

@endsection