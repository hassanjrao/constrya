@extends('layouts.simple')
@section('page-title', __('Inscribirse'))
@section('content')
    <div class="content">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 col-xl-8">
                <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ __('Inscribirse') }}</h3>
                        <div class="block-options">
                            <a class="btn-block-option fs-sm" href="{{ route('login') }}">{{ __('¿Ya estás registrado?') }}</a>
                            <a class="btn-block-option js-bs-tooltip-enabled" href="{{ route('login') }}">
                                <i class="fa fa-user-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="">

                            <form class="js-validation-signin"
                                action="{{ route('plans.processRegister', ['plan' => $plan->id]) }}" method="POST">
                                @csrf
                                <div class="py-3">
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <div class="">
                                                <label class="form-label" for="email">{{ __('Nombre') }}</label>
                                                <input type="text"
                                                    class="form-control form-control-alt form-control-lg @error('name') is-invalid @enderror"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus
                                                    id="name" name="name" placeholder="Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
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
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <div class="">
                                                <label class="form-label" for="phone">{{ __('Teléfono') }}</label>
                                                <input type="tel"
                                                    class="form-control form-control-alt form-control-lg @error('phone') is-invalid @enderror"
                                                    value="{{ old('phone') }}" required autocomplete="phone" autofocus
                                                    id="phone" name="phone" placeholder="Phone">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="">
                                                <label class="form-label" for="profession">{{ __('Profesión') }}</label>
                                                <input type="text"
                                                    class="form-control form-control-alt form-control-lg @error('profession') is-invalid @enderror"
                                                    value="{{ old('profession') }}" required autocomplete="profession"
                                                    autofocus id="profession" name="profession" placeholder="Profession">
                                                @error('profession')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mb-4">

                                        <div class="col-lg-6">
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

                                        <div class="col-lg-6">
                                            <label class="form-label" for="password_confirmation">{{ __('confirmar Contraseña') }}</label>
                                            <input type="password"
                                                class="form-control form-control-alt form-control-lg @error('password') is-invalid @enderror"
                                                id="password_confirmation" name="password_confirmation" required autocomplete="current-password_confirmation"
                                                placeholder="Confirm Password">



                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="plan">{{ __('Plan seleccionado') }}</label>
                                                <input type="text"
                                                    class="form-control form-control-alt form-control-lg @error('plan') is-invalid @enderror"
                                                    value="{{ $plan->name }} - {{ $plan->price }}" disabled required
                                                    autocomplete="plan" autofocus id="plan" name="plan"
                                                    placeholder="plan">
                                                @error('plan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-4 justify-content-center">
                                    <div class="col-md-6 col-xl-5 text-center">
                                        <button type="submit" class="btn w-50 btn-alt-primary">
                                            <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> {{ __('Inscribirse') }}
                                        </button>
                                    </div>

                                </div>
                            </form>

                            {{-- dont have account --}}

                            <div class="text-center">
                                <p class="text-muted">
                                    {{ __('¿Ya tienes una cuenta?') }}
                                    <a href="{{ route('login') }}">
                                        {{ __('Iniciar sesión') }}
                                    </a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
