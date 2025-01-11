@extends('layouts.simple')
@section('page-title', 'Login')
@section('content')
    <div class="content">

        <div class="row justify-content-center push">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Sign In</h3>
                        <div class="block-options">
                            <a class="btn-block-option fs-sm" href="{{ route('password.request') }}">Forgot Password?</a>
                            <a class="btn-block-option js-bs-tooltip-enabled" href="{{ route('plans.index') }}"
                                data-bs-toggle="tooltip" data-bs-placement="left" aria-label="New Account"
                                data-bs-original-title="New Account">
                                <i class="fa fa-user-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="">

                            <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="py-3">
                                    <div class="mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email"
                                            class="form-control form-control-alt form-control-lg @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            id="email" name="email" placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="login-password">Password</label>
                                        <input type="password"
                                            class="form-control form-control-alt form-control-lg @error('password') is-invalid @enderror"
                                            id="login-password" name="password" required autocomplete="current-password"
                                            placeholder="Password">


                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="login-remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="login-remember">Remember Me</label>
                                        </div>
                                    </div>


                                </div>
                                <div class="row mb-4 justify-content-center">
                                    <div class="col-md-6 col-xl-5 text-center">
                                        <button type="submit" class="btn btn-alt-primary">
                                            <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Sign In
                                        </button>
                                    </div>

                                </div>
                            </form>

                            {{-- dont have account --}}

                            <div class="text-center">
                                <p class="text-muted">
                                    Don't have an account?
                                    <a href="{{ route('plans.index') }}">Sign Up</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
