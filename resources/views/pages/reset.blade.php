@extends('layout.app')

@section('title', 'Reset Password')

@section('content')
<main>
    <section class="section register mt-5 mb-5 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                                <p class="text-center small">Enter your new password</p>
                            </div>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="mb-1">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                </div>
                                <div class="mb-1">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-1">
                                    <label for="password-confirm" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                                </div>
                                <div class="text-center my-3">
                                    <button type="submit" class="btn btn-fill-blue" style="width: 100%">Reset Password</button>
                                </div>

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
