@extends('layout.app')

@section('content')

<div class=" set-breadcrumb " style="">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb m-2 ">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container my-5">
    <div class="row pt-5 ">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @if(Auth::user()->profile_image)
                    <div class="" style="background-image : url('{{ asset(Auth::user()->profile_image) }}'); background-position: center; background-size: cover; width: 150px; height:150px; border-radius:50%">

                    </div>
                    @else
                    <img src="assets/img/profil.png" style="width: 150px" alt="Profile" class="rounded-circle">
                    @endif
                    <h4 class="mt-3">{{ Auth::user()->nama }}</h4>
                    <h5>{{ Auth::user()->pengguna }}</h5>
                </div>
            </div>


        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                Profil</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ganti Kata Sandi</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title fw-bold">Tentang Saya</h5>
                            <p class="small fst-italic">{{ Auth::user()->tentang }}</p>

                            <h5 class="card-title fw-bold mt-5 mb-3">Detail Profil</h5>

                            <div class="row mb-2">
                                <div class="col-lg-3 col-md-4 fw-light label ">Nama Lengkap</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->nama }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-3 col-md-4 fw-light label">Pekerjaan</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->pekerjaan }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-3 col-md-4 fw-light label">Nama Usaha</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->nama_usaha }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-3 col-md-4 fw-light label">Jumlah Karyawan</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->karyawan }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-3 col-md-4 fw-light label">Alamat</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->alamat }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-3 col-md-4 fw-light label">Nomor Handphone</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->nomor_hp }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-3 col-md-4 fw-light label">Email</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                            </div>

                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                            <!-- Profile Edit Form -->
                            <form method="POST" action="{{ route('update_profil', Auth::user()->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="alert alert-info">
                                    <strong>Perhatian:</strong> Perbarui bidang yang kosong.
                                </div>

                                <div class="row mb-3">
                                    <label for="image" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                                    <div class="col-md-8 col-lg-9">
                                        @if(Auth::user()->profile_image)
                                        <div class="" style="background-image : url('{{ asset(Auth::user()->profile_image) }}'); background-position: center; background-size: cover; width: 150px; height:150px; border-radius:50%">

                                        </div>
                                        @else
                                        <img src="assets/img/profil.png" alt="Profile">
                                        @endif
                                        <div class="pt-2">
                                            <input type="file" name="profile_image" class="form-control" style="display: none;" id="profile_image">
                                            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image" onclick="document.getElementById('profile_image').click();"><i class="bi bi-upload"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" id="remove_profile_image"><i class="bi bi-trash"></i></button>
                                            <!-- 
                                            
                                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image" id="remove_profile_image"><i class="bi bi-trash"></i></a> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input placeholder="" name="nama" type="text" class="form-control" id="nama" value="{{ old('nama', Auth::user()->nama) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tentang" class="col-md-4 col-lg-3 col-form-label">Tentang Saya</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="tentang" class="form-control" id="tentang" style="height: 100px" placeholder="" value="{{ old('tentang', Auth::user()->tentang) }}" ></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="pekerjaan" class="col-md-4 col-lg-3 col-form-label">Pekerjaan</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="pekerjaan" type="text" placeholder="" class="form-control" id="pekerjaan" value="{{ old('pekerjaan', Auth::user()->pekerjaan) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nama_usaha" class="col-md-4 col-lg-3 col-form-label">Nama Usaha</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="nama_usaha" placeholder="" type="text" class="form-control" id="nama_usaha" value="{{ old('nama_usaha', Auth::user()->nama_usaha) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="karyawan" class="col-md-4 col-lg-3 col-form-label">Jumlah Karyawan</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="karyawan" type="number" placeholder="" class="form-control" id="karyawan" value="{{ old('karyawan', Auth::user()->karyawan) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="alamat" placeholder="" type="text" class="form-control" id="alamat" value="{{ old('alamat', Auth::user()->alamat) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nomor_hp" class="col-md-4 col-lg-3 col-form-label">Nomor Hp</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input placeholder="" name="nomor_hp" type="text" class="form-control" id="nomor_hp" value="{{ old('email', Auth::user()->nomor_hp) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input placeholder="" name="email" type="email" class="form-control" id="email" value="{{ old('email', Auth::user()->email) }}">
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-fill-blue">Simpan Perubahan</button>
                                </div>
                            </form><!-- End Profile Edit Form -->

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $('#remove_profile_image').on('click', function() {
                                        $.ajax({
                                            url: '{{ route("remove_profile_image") }}',
                                            type: 'POST',
                                            contentType: 'application/json',
                                            data: JSON.stringify({
                                                /* data tambahan jika diperlukan */
                                            }),
                                            success: function(response) {
                                                // Tindakan setelah sukses menghapus gambar profil
                                                location.reload();
                                                // console.log(response);
                                            },
                                            error: function(xhr, status, error) {
                                                console.error('Error:', error);
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>

                        <div class="tab-pane fade pt-3" id="profile-settings">

                            {{-- <!-- Settings Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                            Notifications</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                                <label class="form-check-label" for="changesMade">
                                                    Changes made to your account
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                                <label class="form-check-label" for="newProducts">
                                                    Information on new products and services
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="proOffers">
                                                <label class="form-check-label" for="proOffers">
                                                    Marketing and promo offers
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="securityNotify"
                                                    checked disabled>
                                                <label class="form-check-label" for="securityNotify">
                                                    Security alerts
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End settings Form --> --}}

                        </div>

                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form method="POST" action="{{ route('ubah_password', Auth::user()->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Kata Sandi Sekarang</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="current_password" type="password" class="form-control" id="current_password">
                                        @error('current_password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="new_password" class="col-md-4 col-lg-3 col-form-label">Kata Sandi Baru</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="new_password" type="password" class="form-control" id="new_password">
                                        @error('new_password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Masukkan Ulang Kata Sandi Baru</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="new_password_confirmation" type="password" class="form-control" id="renewPassword">
                                        @error('new_password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-fill-blue">Ganti Kata Sandi</button>
                                </div>
                            </form>


                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</div>
@endsection