<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>User manage</title>

        <meta name="description" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Dashmix">
        <meta property="og:description" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
        <!-- END Icons -->

        <!-- Stylesheets -->
        @yield('css_before')
        <!-- Fonts and Dashmix framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ URL::asset('assets/css/dashmix.min.css') }}">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
        <link rel="stylesheet" id="css-theme" href="{{ URL::asset('assets/css/themes/xmodern.min.css') }}">
        <!-- END Stylesheets -->
        @yield('css_after')

        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>

        @yield('css')
        
    </head>
    <body>
        <div id="page-container" class="sidebar-o sidebar-dark side-scroll page-header-fixed main-content-boxed">

            <!-- Sidebar -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header justify-content-lg-center bg-black-10">
                    <!-- Logo -->
                    <a class="link-fx font-size-lg text-white" href="index.html">
                        <span class="text-white-75">X</span>
                        <span class="text-white">Hosting</span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div class="d-lg-none">
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-times-circle"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
                <!-- END Side Header -->

                

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('user_manage') ? ' active' : '' }}" href="{{ url('user_manage') }}">
                                <i class="nav-main-link-icon fa fa-chart-pie"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">My shop</li>
                        
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('myshop') ? ' active' : '' }}" href="{{ url('myshop') }}">
                                <i class="nav-main-link-icon fa fa-server"></i>
                                <span class="nav-main-link-name">ร้านค้า</span>
                            </a>
                        </li>
                        
                        
                        <li class="nav-main-heading">Account</li>
                        
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('myaccount') ? ' active' : '' }}" href="{{ url('myaccount') }}">
                                <i class="nav-main-link-icon fa fa-user"></i>
                                <span class="nav-main-link-name">ข้อมูลส่วนตัว</span>
                            </a>
                        </li>
                        
                        <li class="nav-main-heading">Sing out</li>
                        
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ url('logout') }}">
                                <i class="nav-main-link-icon si si-logout"></i>
                                <span class="nav-main-link-name">ออกจากระบบ</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- END Side Navigation -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div>
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-dual mr-1 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Open Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-dual d-lg-none" data-toggle="layout" data-action="header_search_on">
                            <i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block">Search..</span>
                        </button>
                        <!-- END Open Search Section -->

                        <!-- Search form in larger screens -->
                        <form class="d-none d-lg-inline-block" action="be_pages_generic_search.html" method="post">
                            <input type="text" class="form-control rounded-lg px-4" placeholder="Search.." id="page-header-search-input-full" name="page-header-search-input-full">
                        </form>
                        <!-- END Search form in larger screens -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div>
                        <!-- User Dropdown -->

                        <a class="btn btn-dual" href="{{ url('invite') }}">
                            <i class="fa fa-fw fa-inbox text-primary"></i>
                            <span class="nav-main-link-name">คำเชิญ</span>
                            <? if($invite > 0){ ?>
                            <span class="badge badge-pill badge-warning ml-1">{{ $invite }}</span>
                            <? } ?>
                        </a>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-avatar img-avatar32 img-avatar-thumb" src="assets/media/avatars/avatar16.jpg" alt="">
                                <span class="d-none d-lg-inline ml-1">{{ session()->get('uname') }}</span>
                                <span class="badge badge-pill badge-success ml-1">PRO</span>
                                <i class="fa fa-fw fa-angle-down ml-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg p-0" aria-labelledby="page-header-user-dropdown">
                                <div class="bg-body-light rounded-top font-w600 text-white text-center p-3">
                                    <img class="img-avatar" src="assets/media/avatars/avatar16.jpg" alt="">
                                    <div class="pt-2">
                                        <a class="text-dark font-w600" href="be_pages_generic_profile.html">Matt Doe</a>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="row no-gutters">
                                        <div class="col-6 pr-2 border-right">
                                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                                                Profile
                                                <i class="fa fa-fw fa-user text-black-50 ml-1"></i>
                                            </a>
                                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                                                Settings
                                                <i class="fa fa-fw fa-cog text-black-50 ml-1"></i>
                                            </a>
                                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                                                Billing
                                                <i class="fa fa-fw fa-money-check-alt text-black-50 ml-1"></i>
                                            </a>
                                        </div>
                                        <div class="col-6 pl-2">
                                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                                                Servers
                                                <i class="fa fa-fw fa-server text-black-50 ml-1"></i>
                                            </a>
                                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                                                Domains
                                                <i class="fa fa-fw fa-globe text-black-50 ml-1"></i>
                                            </a>
                                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                                                Plans
                                                <i class="fa fa-fw fa-chess-rook text-black-50 ml-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ url('logout') }}">
                                        Sign Out
                                        <i class="fa fa-fw fa-sign-out-alt text-danger ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-sidebar-dark">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-danger" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control border-0" placeholder="Search Application.." id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary-darker">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                
                @yield('content')

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer">
                <div class="content py-0">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://goo.gl/vNS3I" target="_blank">pixelcave</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                            <a class="font-w600" href="https://goo.gl/mDBqx1" target="_blank">Dashmix 1.3</a> &copy; <span data-toggle="year-copy">2018</span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <script src="{{ URL::asset('assets/js/dashmix.core.min.js') }}"></script>

  
        <script src="{{ URL::asset('assets/js/dashmix.app.min.js') }}"></script>

        @yield('js_after')
        
        @include('sweetalert::cdn')
        @include('sweetalert::view')
        @include('sweetalert::validator')

        @yield('js')
    </body>
</html>