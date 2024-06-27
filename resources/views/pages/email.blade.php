@extends('layout.app')

@section('title', 'Reset Password')

@section('content')
<main>
    <section class="section register mt-5 mb-5 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="text-center mb-5">
                        <img src="{{ asset('assets/img/logo-lms.png') }}" alt="" style="width: 150px">
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                                <p class="text-center small">Enter your email to reset your password</p>
                            </div>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="mb-1">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="text-center my-3">
                                    <button type="submit" class="btn btn-fill-blue" style="width: 100%">Send Password Reset Link</button>
                                </div>

                                @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                @endif

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                    <div class="credits">
                        <a href="{{ route('login.index') }}">Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection