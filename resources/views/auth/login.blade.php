@extends('layouts.simple')
@section('page-title', __('Iniciar sesión') )
@section('content')
    <div class="content">

        <div class="row justify-content-center push">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ __('Iniciar sesión') }}</h3>
                        <div class="block-options">
                            <a class="btn-block-option fs-sm" href="{{ route('password.request') }}">{{ __('¿Has olvidado tu contraseña?') }}</a>
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
                                        <label class="form-label" for="email">{{ __('Correo electrónico') }}</label>
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
                                        <label class="form-label" for="login-password">{{ __('Contraseña') }}</label>
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

                                            <label class="form-check-label" for="login-remember">{{ __('Acuérdate de mí') }}</label>
                                        </div>
                                    </div>


                                </div>
                                <div class="row mb-4 justify-content-center">
                                    <div class="col-md-6 col-xl-5 text-center">
                                        <button type="submit" class="btn btn-alt-primary">
                                            <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> {{ __('Iniciar sesión') }}
                                        </button>
                                    </div>

                                </div>
                            </form>

                            {{-- dont have account --}}

                            <div class="text-center">
                                <p class="text-muted">
                                    {{ __('¿No tienes una cuenta?') }}
                                    <a href="{{ route('plans.index') }}">{{ __('Crear una cuenta') }}</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
