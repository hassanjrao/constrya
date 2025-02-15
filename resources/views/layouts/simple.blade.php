<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield('page-title') - {{ config('app.name') }}</title>



    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('css/oneui.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ asset('css/themes/amethyst.css') }}"> -->
    <!-- END Stylesheets -->

    <style>
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(calc(-250px * 7));
            }
        }

        .slider {
            background: white;
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, .125);
            height: 100px;
            margin: auto;
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        .slider::before,
        .slider::after {
            background: linear-gradient(to right, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 100%);
            content: "";
            height: 100px;
            position: absolute;
            width: 200px;
            z-index: 2;
        }

        .slider::after {
            right: 0;
            top: 0;
            transform: rotateZ(180deg);
        }

        .slider::before {
            left: 0;
            top: 0;
        }

        .slide-track {
            animation: scroll 40s linear infinite;
            display: flex;
            width: calc(250px * 14);
        }

        .slide {
            height: 100px;
            width: 250px;
        }
    </style>
    @yield('styles')
</head>

<body>
    <!-- Page Container -->
    <!--
        Available classes for #page-container:

    GENERIC

        'remember-theme'                            Remembers active color theme between pages using localStorage (when set through color theme helper Template._uiHandleTheme())

    SIDEBAR & SIDE OVERLAY

        'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
        'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
        'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
        'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
        'sidebar-dark'                              Dark themed sidebar

        'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
        'side-overlay-o'                            Visible Side Overlay by default

        'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

        'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

    HEADER

        ''                                          Static Header if no class is added
        'page-header-fixed'                         Fixed Header

    HEADER STYLE

        ''                                          Light themed Header
        'page-header-dark'                          Dark themed Header

    MAIN CONTENT LAYOUT

        ''                                          Full width Main Content if no class is added
        'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
        'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

    DARK MODE

        'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
    -->
    @php
        $calculators = \App\Models\Calculator::all();
        $banners = \App\Models\Banner::all();
    @endphp
    <div id="page-container" class="page-header-dark main-content-boxed">

        <div class="slider">
            <div class="slide-track">
                @foreach ($banners as $banner)
                    <div class="slide">
                        <img src="{{ $banner->image_url }}" height="100" width="250" alt="" />
                    </div>
                @endforeach
                @foreach ($banners as $banner)
                    <div class="slide">
                        <img src="{{ $banner->image_url }}" height="100" width="250" alt="" />
                    </div>
                @endforeach
                @foreach ($banners as $banner)
                    <div class="slide">
                        <img src="{{ $banner->image_url }}" height="100" width="250" alt="" />
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Logo -->
                    <a class="fw-semibold fs-5 tracking-wider text-dual me-3" href="{{ route('home') }}">
                        <img src="{{ asset('media/logos/logo.png') }}" style="width: 60px" alt="">
                    </a>


                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="d-flex align-items-center">


                    @guest

                        <a href="{{ route('plans.index') }}" class="btn btn-sm btn-alt-secondary"
                            id="page-header-user-dropdown">


                            {{-- join premium icon --}}
                            <i class="fa fa-fw fa-crown"></i>
                            <span class="d-none d-sm-inline-block ms-1">Join Premium</span>
                        </a>

                        <a href="{{ route('login') }}" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown">

                            <i class="fa fa-fw fa-user"></i>
                            <span class="d-none d-sm-inline-block ms-1">Login</span>
                        </a>

                    @endguest

                    @auth

                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block ms-2">
                            <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="Header Avatar"
                                    style="width: 21px;" />
                                <span class="d-none d-sm-inline-block ms-1">{{ auth()->user()->name }}</span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
                                aria-labelledby="page-header-user-dropdown">

                                <div class="p-2">

                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                        href="{{ route('user.profile.index') }}">
                                        <span class="fs-sm fw-medium">Profile</span>
                                    </a>
                                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
                                        @csrf

                                    </form>


                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                        onclick="document.getElementById('logout-form').submit()">
                                        <span class="fs-sm fw-medium">Log Out</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <!-- END User Dropdown -->

                    @endauth
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->



            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-primary-lighter">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-circle-notch fa-spin text-primary"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">

            <!-- Navigation -->
            <div class="bg-primary-darker">
                <div class="content py-3">
                    <!-- Toggle Main Navigation -->
                    <div class="d-lg-none">
                        <!-- Class Toggle, functionality initialized in Helpers.oneToggleClass() -->
                        <button type="button"
                            class="btn w-100 btn-alt-secondary d-flex justify-content-between align-items-center"
                            data-toggle="class-toggle" data-target="#main-navigation" data-class="d-none">
                            Menu
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- END Toggle Main Navigation -->

                    <!-- Main Navigation -->
                    <div id="main-navigation" class="d-none d-lg-block mt-2 mt-lg-0">
                        <ul class="nav-main nav-main-dark nav-main-horizontal nav-main-hover">
                            @foreach ($calculators as $calculator)
                                <li class="nav-main-item">
                                    <a class="nav-main-link {{ request()->is($calculator->slug . '/calculate') ? ' active' : '' }}"
                                        href="{{ route('calculator.show', $calculator->slug) }}">
                                        <i class="nav-main-link-icon si si-compass"></i>
                                        <span class="nav-main-link-name">
                                            {{ $calculator->name }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach

                            <li class="nav-main-item">
                                <a class="nav-main-link {{ request()->is('user/memory-calculations') ? ' active' : '' }}"
                                    href="{{ route('user.memory-calculations.index',1) }}">
                                    <i class="nav-main-link-icon si si-compass"></i>
                                    <span class="nav-main-link-name">
                                        {{ __('Memory Calculations') }}
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- END Main Navigation -->
                </div>
            </div>
            <!-- END Navigation -->
            <!-- Page Content -->
            <div class="content">

                @auth
                    @if (!auth()->user()->subscribed_at && request()->segment(4) !== 'pay')
                        @role('user')
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <p class="mb-0">

                                            <a class="alert-link"
                                                href="{{ route('user.plans.pay', ['plan' => auth()->user()->plan_id]) }}">
                                                {{ __('Please click here to pay the fee to enjoy premium features') }}
                                            </a>!
                                        </p>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        @endrole
                    @endif

                @endauth


                <div class="push">
                    @yield('content')
                </div>

            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-extra-light">
            <div class="content py-3">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        All rights reserved.
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="https://1.envato.market/AVD6j"
                            target="_blank">{{ config('app.name') }}</a>
                        &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
        OneUI JS

        Core libraries and functionality
        webpack is putting everything together at {{ asset('_js/main/app.js') }}
    -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('js/oneui.app.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')


    <script>
        function alertSuccess(text) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: text
            });
        }

        function alertError(text) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                showCancelButton: true,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: text
            });
        }
    </script>

    @stack('scripts')


</body>

</html>
