<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Go</title>

        <meta name="description" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Fonts and Styles -->
        @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/dashmix.css') }}">

        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" href="{{ URL::asset('assets/css/themes/xwork.css') }}"> -->
        @yield('css_after')

        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
        
        @yield('css')

    </head>
    <body>
       
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Header -->
                <div class="bg-image" style="background-image: url('{{ asset('assets/media/various/bg_side_overlay_header.jpg') }}');">
                    <div class="bg-primary-op">
                        <div class="content-header">
                            <!-- User Avatar -->
                            <a class="img-link mr-1" href="javascript:void(0)">
                                <img class="img-avatar img-avatar48" src="{{ asset('assets/media/avatars/avatar10.jpg') }}" alt="">
                            </a>
                            <!-- END User Avatar -->

                            <!-- User Info -->
                            <div class="ml-2">
                                <a class="text-white font-w600" href="javascript:void(0)">George Taylor</a>
                                <div class="text-white-75 font-size-sm font-italic">Full Stack Developer</div>
                            </div>
                            <!-- END User Info -->

                            <!-- Close Side Overlay -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="ml-auto text-white" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Side Overlay -->
                        </div>
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Side Content -->
                <div class="content-side">
                    <p>
                        Content..
                    </p>
                </div>
                <!-- END Side Content -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="bg-header-dark">
                    <div class="content-header bg-white-10">
                        <!-- Logo -->
                        <a class="link-fx font-w600 font-size-lg text-white" href="/">
                            <span class="text-white-75">Dash</span><span class="text-white">mix</span>
                        </a>
                        <!-- END Logo -->

                        <!-- Options -->
                        <div>
                            <!-- Toggle Sidebar Style -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                            <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" data-toggle="layout" data-action="sidebar_style_toggle" href="javascript:void(0)">
                                <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                            </a>
                            <!-- END Toggle Sidebar Style -->

                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Sidebar -->
                        </div>
                        <!-- END Options -->
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="{{ url('dashboard') }}">
                                <i class="nav-main-link-icon si si-cursor"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">ช่องทางการขาย</li>

                        <?
                        if((session()->get('udlevel') > '4') || (strrpos(session()->get('udright'), 'AA/') == true))
                        {
                        ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('sale*') ? ' active' : '' }}" href="{{ url('sale') }}" target="_blank">
                                <i class="nav-main-link-icon si si-cursor"></i>
                                <span class="nav-main-link-name">POS</span>
                            </a>
                        </li>
                        <?
                        }
                        ?>




                        <li class="nav-main-heading">คลังสินค้า</li>

                        

                        <?
                        if((session()->get('udlevel') > '4') || (strrpos(session()->get('udright'), 'AB/') == true))
                        {
                        ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('product*') ? ' active' : '' }}" href="{{ url('product/nonsn') }}">
                                <i class="nav-main-link-icon si si-cursor"></i>
                                <span class="nav-main-link-name">รายการสินค้า</span>
                            </a>
                        </li>

                        <?
                        }
                        if((session()->get('udlevel') > '4') || (strrpos(session()->get('udright'), 'AC/') == true))
                        {
                        ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('cat_product') ? ' active' : '' }}" href="{{ url('cat_product') }}">
                                <i class="nav-main-link-icon si si-cursor"></i>
                                <span class="nav-main-link-name">หมวดหมู่สินค้า</span>
                            </a>
                        </li>

                        <?
                        }
                        if((session()->get('udlevel') > '4') || (strrpos(session()->get('udright'), 'AD/') == true))
                        {
                        ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('supplier') ? ' active' : '' }}" href="{{ url('supplier') }}">
                                <i class="nav-main-link-icon si si-cursor"></i>
                                <span class="nav-main-link-name">ผู้ขาย/ผู้ผลิต</span>
                            </a>
                        </li>
                        <?
                        }
                        ?>


                        <li class="nav-main-heading">การเคลื่อนไหวของสินค้า</li>


                        <?
                        if((session()->get('udlevel') > '4') || (strrpos(session()->get('udright'), 'AE/') == true))
                        {
                        ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('list/salelist') ? ' active' : '' }}" href="{{ url('list/salelist') }}">
                                <i class="nav-main-link-icon si si-cursor"></i>
                                <span class="nav-main-link-name">รายการขาย</span>
                            </a>
                        </li>

                        <?
                        }
                        if((session()->get('udlevel') > '4') || (strrpos(session()->get('udright'), 'AF/') == true))
                        {
                        ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('doc/*') ? ' active' : '' }}" href="{{ url('doc/list') }}">
                                <i class="nav-main-link-icon si si-cursor"></i>
                                <span class="nav-main-link-name">รายการสั่งซื้อ</span>
                            </a>
                        </li>
                        <?
                        }
                        ?>

                        <li class="nav-main-heading">รายงาน</li>

                        <?
                        if((session()->get('udlevel') > '4') || (strrpos(session()->get('udright'), 'AG/') == true))
                        {
                        ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('report') ? ' active' : '' }}" href="{{ url('report') }}">
                                <i class="nav-main-link-icon si si-cursor"></i>
                                <span class="nav-main-link-name">รายงาน</span>
                            </a>
                        </li>
                        <?
                        }
                        ?>

                        <li class="nav-main-heading">จัดการร้าน</li>

                        <?
                        if(session()->get('udlevel') > '4')
                        {
                        ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('employee*') ? ' active' : '' }}" href="{{ url('employee') }}">
                                <i class="nav-main-link-icon si si-cursor"></i>
                                <span class="nav-main-link-name">พนักงาน</span>
                            </a>
                        </li>
                        <?
                        }
                        ?>

                        <?
                        if(session()->get('udlevel') > '4')
                        {
                        ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('payment*') ? ' active' : '' }}" href="{{ url('payment') }}">
                                <i class="nav-main-link-icon si si-cursor"></i>
                                <span class="nav-main-link-name">การชำระเงิน</span>
                            </a>
                        </li>
                        <?
                        }
                        ?>


                        <li class="nav-main-heading">ออก</li>


                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ url('user_manage') }}">
                                <i class="nav-main-link-icon si si-cursor"></i>
                                <span class="nav-main-link-name">ออกจากร้านค้า</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('logout') ? ' active' : '' }}" href="{{ url('logout') }}">
                                <i class="nav-main-link-icon si si-cursor"></i>
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
                        <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Open Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-dual" data-toggle="layout" data-action="header_search_on">
                            <i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block">Search</span>
                        </button>
                        <!-- END Open Search Section -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div>
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-user d-sm-none"></i>
                                <span class="d-none d-sm-inline-block">{{ session()->get('uname') }}</span>
                                <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                                <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                   User Options
                                </div>
                                <div class="p-2">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-user mr-1"></i> Profile
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span><i class="far fa-fw fa-envelope mr-1"></i> Inbox</span>
                                        <span class="badge badge-primary">3</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-file-alt mr-1"></i> Invoices
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>

                                    <!-- Toggle Side Overlay -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                        <i class="far fa-fw fa-building mr-1"></i> Settings
                                    </a>
                                    <!-- END Side Overlay -->

                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->

                        <!-- Notifications Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-bell"></i>
                                <span class="badge badge-secondary badge-pill">5</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                   Notifications
                                </div>
                                <ul class="nav-items my-2">
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mx-3">
                                                <i class="fa fa-fw fa-check-circle text-success"></i>
                                            </div>
                                            <div class="media-body font-size-sm pr-2">
                                                <div class="font-w600">App was updated to v5.6!</div>
                                                <div class="text-muted font-italic">3 min ago</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mx-3">
                                                <i class="fa fa-fw fa-user-plus text-info"></i>
                                            </div>
                                            <div class="media-body font-size-sm pr-2">
                                                <div class="font-w600">New Subscriber was added! You now have 2580!</div>
                                                <div class="text-muted font-italic">10 min ago</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mx-3">
                                                <i class="fa fa-fw fa-times-circle text-danger"></i>
                                            </div>
                                            <div class="media-body font-size-sm pr-2">
                                                <div class="font-w600">Server backup failed to complete!</div>
                                                <div class="text-muted font-italic">30 min ago</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mx-3">
                                                <i class="fa fa-fw fa-exclamation-circle text-warning"></i>
                                            </div>
                                            <div class="media-body font-size-sm pr-2">
                                                <div class="font-w600">You are running out of space. Please consider upgrading your plan.</div>
                                                <div class="text-muted font-italic">1 hour ago</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mx-3">
                                                <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                            </div>
                                            <div class="media-body font-size-sm pr-2">
                                                <div class="font-w600">New Sale! + $30</div>
                                                <div class="text-muted font-italic">2 hours ago</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="p-2 border-top">
                                    <a class="btn btn-light btn-block text-center" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-eye mr-1"></i> View All
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END Notifications Dropdown -->

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="far fa-fw fa-list-alt"></i>
                        </button>
                        <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-primary">
                    <div class="content-header">
                        <form class="w-100" action="/dashboard" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
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
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-0">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://goo.gl/vNS3I" target="_blank">pixelcave</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                            <a class="font-w600" href="https://goo.gl/mDBqx1" target="_blank">Dashmix</a> &copy; <span data-toggle="year-copy">2018</span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Dashmix Core JS -->
        {{-- <script src="{{ URL::asset('assets/js/dashmix.app.js') }}"></script> --}}

        <!-- Laravel Scaffolding JS -->
        <script src="{{ URL::asset('assets/js/laravel.app.js') }}"></script>


        @yield('js_after')

        @include('sweetalert::cdn')
        @include('sweetalert::view')
        @include('sweetalert::validator')

        @yield('js')

        @yield('script')

    </body>
</html>
