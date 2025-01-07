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
    <div id="page-container" class="sidebar-dark side-scroll page-header-fixed page-header-dark">

        <!-- Sidebar -->
        <!--
          Sidebar Mini Mode - Display Helper classes

          Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
          Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
              If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

          Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
          Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
          Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
      -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header bg-white-5">
                <!-- Logo -->
                <a class="fw-semibold text-dual" href="index.html">
                    <span class="smini-visible">
                        <i class="fa fa-circle-notch text-primary"></i>
                    </span>
                    <span class="smini-hide fs-5 tracking-wider">
                        {{ config('app.name') }}
                    </span>
                </a>
                <!-- END Logo -->

                <!-- Extra -->
                <div>
                    <!-- Options -->
                    <div class="dropdown d-inline-block ms-1">
                        <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-circle"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end fs-sm smini-hide border-0"
                            aria-labelledby="sidebar-themes-dropdown">
                            <!-- Color Themes -->
                            <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                            <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                                data-toggle="theme" data-theme="default" href="#">
                                <span>Default</span>
                                <i class="fa fa-circle text-default"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                                data-toggle="theme" data-theme="{{ asset('css/themes/amethyst.min.css') }}"
                                href="#">
                                <span>Amethyst</span>
                                <i class="fa fa-circle text-amethyst"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                                data-toggle="theme" data-theme="{{ asset('css/themes/city.min.css') }}" href="#">
                                <span>City</span>
                                <i class="fa fa-circle text-city"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                                data-toggle="theme" data-theme="{{ asset('css/themes/flat.min.css') }}" href="#">
                                <span>Flat</span>
                                <i class="fa fa-circle text-flat"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                                data-toggle="theme" data-theme="{{ asset('css/themes/modern.min.css') }}"
                                href="#">
                                <span>Modern</span>
                                <i class="fa fa-circle text-modern"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                                data-toggle="theme" data-theme="{{ asset('css/themes/smooth.min.css') }}"
                                href="#">
                                <span>Smooth</span>
                                <i class="fa fa-circle text-smooth"></i>
                            </a>
                            <!-- END Color Themes -->
                        </div>
                    </div>
                    <!-- END Options -->

                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout"
                        data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Extra -->
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side Navigation -->
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="{{ route('home') }}">
                                <i class="nav-main-link-icon si si-home"></i>
                                <span class="nav-main-link-name">Home</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="javascript:void(0)">
                                <i class="nav-main-link-icon si si-rocket"></i>
                                <span class="nav-main-link-name">Features</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('plans.index') }}">
                                <i class="nav-main-link-icon si si-wallet"></i>
                                <span class="nav-main-link-name">Join Premium</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="javascript:void(0)">
                                <i class="nav-main-link-icon si si-envelope"></i>
                                <span class="nav-main-link-name">Contact</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header" style="margin: 20px 0px;">
                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Logo -->
                    <a class="fw-semibold fs-5 tracking-wider text-dual me-3" href="index.html">
                        <img src="{{ asset('media/logos/logo.png') }}" class="img-fluid" style="width: 100px;"
                            alt="">
                    </a>
                    <!-- END Logo -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="d-flex align-items-center">
                    <!-- Menu -->
                    <div>
                        <div class="d-none d-lg-block">
                            <ul class="nav-main nav-main-horizontal nav-main-hover">
                                <li class="nav-main-item">
                                    <a class="nav-main-link active" href="{{ route('home') }}">
                                        <i class="nav-main-link-icon si si-home"></i>
                                        <span class="nav-main-link-name">Home</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                        aria-haspopup="true" aria-expanded="false" href="#">
                                        <span class="nav-main-link-name">Calculators</span>
                                    </a>
                                    <ul class="nav-main-submenu nav-main-submenu-right">
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" data-toggle="theme" data-theme="default"
                                                href="#">
                                                <span class="nav-main-link-name">SheetRock</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" data-toggle="theme" data-theme="default"
                                                href="#">
                                                <span class="nav-main-link-name">Facius</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" data-toggle="theme" data-theme="default"
                                                href="#">
                                                <span class="nav-main-link-name">Flat Ceiling</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" data-toggle="theme" data-theme="default"
                                                href="#">
                                                <span class="nav-main-link-name">Muros</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" data-toggle="theme" data-theme="default"
                                                href="#">
                                                <span class="nav-main-link-name">Plafon</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" data-toggle="theme" data-theme="default"
                                                href="#">
                                                <span class="nav-main-link-name">Quotation</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" data-toggle="theme" data-theme="default"
                                                href="#">
                                                <span class="nav-main-link-name">Memory Calculations</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('plans.index') }}">
                                        <i class="nav-main-link-icon si si-wallet"></i>
                                        <span class="nav-main-link-name">Join Premium</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="javascript:void(0)">
                                        <i class="nav-main-link-icon si si-envelope"></i>
                                        <span class="nav-main-link-name">Contact</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <!-- END Menu -->

                    <div class="">
                        <!-- Logo -->
                        <a class="btn btn-primary btn-sm  px-2 py-1 m-1" href="{{ route('login') }}">
                            <i class="fa fa-fw fa-link  me-1"></i> Login
                        </a>
                        <!-- END Logo -->
                    </div>

                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none ms-1" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->
                </div>
                <!-- END Right Section -->

            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-body-extra-light">
                <div class="content-header">
                    <form class="w-100" method="POST">
                        <div class="input-group input-group-sm">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-alt-danger" data-toggle="layout"
                                data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                            <input type="text" class="form-control" placeholder="Search or hit ESC.."
                                id="page-header-search-input" name="page-header-search-input">
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

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
        <main id="main-container" style="padding-top: 120px">

            @yield('content')
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-extra-light">
            <div class="content py-4">
                <!-- Footer Navigation -->
                <div class="row items-push fs-sm border-bottom pt-4 justify-content-center">
                    <div class="col-md-4">

                    </div>
                    <div class="col-6 col-md-4">
                        <h3>Important Links</h3>
                        <ul class="list list-simple-mini">
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #1
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #2
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #3
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #4
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #5
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-link text-primary-lighter me-1"></i> Link #6
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-4">
                        <h3>Company</h3>
                        <div class="fs-sm push">
                            1080 Sunshine Valley, Suite 2563<br>
                            San Francisco, CA 85214<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </div>

                    </div>
                </div>
                <!-- END Footer Navigation -->

                <!-- Footer Copyright -->
                <div class="row fs-sm pt-4">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        All Rights Reserved &copy; {{ config('app.name') }}
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="https://1.envato.market/AVD6j"
                            target="_blank">{{ config('app.name') }}</a>
                        &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
                <!-- END Footer Copyright -->
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
        OneUI JS

        Core libraries and functionality
        webpack is putting everything together at {{ asset('js/main/app.js') }}
    -->
    <script src="{{ asset('js/oneui.app.js') }}"></script>
</body>

</html>
