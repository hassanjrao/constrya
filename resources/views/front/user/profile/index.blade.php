@extends('layouts.simple')
@section('page-title', 'Sign Up')
@section('content')
    <div class="content">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 col-xl-8">
                <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Profile</h3>

                    </div>
                    <div class="block-content">
                        <div class="">

                            <form class="js-validation-signin" action="{{ route('user.profile.update', $user->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')

                                <div class="py-3">
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <div class="">
                                                <label class="form-label" for="email">{{ __('Name') }}</label>
                                                <input type="text"
                                                    class="form-control form-control-alt form-control-lg @error('name') is-invalid @enderror"
                                                    value="{{ $user->name }}" required autocomplete="name" autofocus
                                                    id="name" name="name" placeholder="{{ __('Name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label" for="email">{{ __('Email') }}</label>
                                            <input type="email"
                                                class="form-control form-control-alt form-control-lg @error('email') is-invalid @enderror"
                                                value="{{ $user->email }}" required autocomplete="email" autofocus
                                                id="email" name="email" placeholder="{{ __('Email') }}">
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
                                                <label class="form-label" for="phone">{{ __('Phone') }}</label>
                                                <input type="tel"
                                                    class="form-control form-control-alt form-control-lg @error('phone') is-invalid @enderror"
                                                    value="{{ $user->phone }}" required autocomplete="phone" autofocus
                                                    id="phone" name="phone" placeholder="{{ __('Phone') }}">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="">
                                                <label class="form-label" for="profession">{{ __('Profession') }}</label>
                                                <input type="text"
                                                    class="form-control form-control-alt form-control-lg @error('profession') is-invalid @enderror"
                                                    value="{{ $user->profession }}" required autocomplete="profession"
                                                    autofocus id="profession" name="profession"
                                                    placeholder="{{ __('Profession') }}">
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
                                            <label class="form-label"
                                                for="current_password">{{ __('Current Password') }}</label>
                                            <input type="password"
                                                class="form-control form-control-alt form-control-lg @error('current_password') is-invalid @enderror"
                                                id="current_password" name="current_password" required
                                                autocomplete="current-password" placeholder="{{ __('Current Password') }}">


                                            @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="form-label" for="new_password">{{ __('New Password') }}</label>
                                            <input type="password"
                                                class="form-control form-control-alt form-control-lg @error('new_password') is-invalid @enderror"
                                                id="new_password" name="new_password" required autocomplete="new_password"
                                                placeholder="{{ __('New Password') }}">

                                            @error('new_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror


                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="plan">{{ __('Current Plan') }}</label>
                                                <input type="text"
                                                    class="form-control form-control-alt form-control-lg @error('plan') is-invalid @enderror"
                                                    value="{{ $user->plan->name }} - {{ config('app.currency_symbol') }}{{ $user->plan->price }} Per Year"
                                                    disabled required autocomplete="plan" autofocus id="plan"
                                                    name="plan" placeholder="plan">
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
                                        <button type="submit" class="btn btn-alt-primary">
                                            <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Update Profile
                                        </button>

                                    </div>




                                </div>
                            </form>

                            @if ($user->is_paid)

                            <div class="row">
                                <div class="col-md-12 col-xl-12 mb-4 text-end">
                                    <form id="form-{{ $user->id }}"
                                        action="{{ route('user.profile.cancelSubscription') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ encrypt($user->id) }}">
                                        <button type="button" onclick="cancelSubscription({{ $user->id }})"
                                            class="btn btn-alt-danger">
                                            {{-- unsubscribe icon --}}
                                            <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i>
                                            {{ __('Cancel Subscription') }}
                                        </button>

                                    </form>
                                </div>
                            </div>

                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        function cancelSubscription(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to cancel your subscription!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-' + id).submit();
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                }
            })
        }
    </script>
@endpush
