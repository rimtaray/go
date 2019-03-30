@extends('layouts.temp')

@section('content')

                <!-- Hero -->
                <div class="bg-image" style="background-image: url('assets/media/various/bg_dashboard.jpg');">
                    <div class="bg-white-90">
                        <div class="content content-full">
                            <div class="row">
                                <div class="col-md-6 d-md-flex align-items-md-center">
                                    <div class="py-4 py-md-0 text-center text-md-left invisible" data-toggle="appear">
                                        <h1 class="font-size-h2 mb-2">Dashboard</h1>
                                        <h2 class="font-size-lg font-w400 text-muted mb-0">Today is a great one!</h2>
                                    </div>
                                </div>
                                <div class="col-md-6 d-md-flex align-items-md-center">
                                    <div class="row w-100 text-center">
                                        <div class="col-6 col-xl-4 offset-xl-4 invisible" data-toggle="appear" data-timeout="300">
                                            <p class="font-size-h3 font-w600 text-body-color-dark mb-0">
                                                {{ number_format($list_m) }}
                                            </p>
                                            <p class="font-size-sm font-w700 text-uppercase mb-0">
                                                <i class="far fa-chart-bar text-muted mr-1"></i> รายการ
                                            </p>
                                        </div>
                                        <div class="col-6 col-xl-4 invisible" data-toggle="appear" data-timeout="600">
                                            <p class="font-size-h3 font-w600 text-body-color-dark mb-0">
                                                {{ number_format($sum_m->sumprice,2,'.',',') }}
                                            </p>
                                            <p class="font-size-sm font-w700 text-uppercase mb-0">
                                                <i class="far fa-chart-bar text-muted mr-1"></i> จำนวนเงินรวม
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    <!-- Quick Stats -->
                    <!-- jQuery Sparkline (.js-sparkline class is initialized in Helpers.sparkline() -->
                    <!-- For more info and examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                    <div class="row">
                        <div class="col-md-6 col-xl-3 invisible" data-toggle="appear">
                            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <!-- Sparkline Dashboard Users Container -->
                                        <span class="js-sparkline" data-type="line"
                                              data-points="[340,330,360,340,360,350,370,360]"
                                              data-width="90px"
                                              data-height="40px"
                                              data-line-color="#82b54b"
                                              data-fill-color="transparent"
                                              data-spot-color="transparent"
                                              data-min-spot-color="transparent"
                                              data-max-spot-color="transparent"
                                              data-highlight-spot-color="#82b54b"
                                              data-highlight-line-color="#82b54b"
                                              data-tooltip-suffix="Users"></span>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <p class="text-muted mb-0">
                                            รายการขายประจำวัน
                                        </p>
                                        <p class="font-size-h3 font-w300 mb-0">
                                            {{ number_format($list_d) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-6 col-xl-3 invisible" data-toggle="appear" data-timeout="400">
                            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <!-- Sparkline Dashboard Projects Container -->
                                        <span class="js-sparkline" data-type="line"
                                              data-points="[7,9,5,2,3,4,8,3]"
                                              data-width="90px"
                                              data-height="40px"
                                              data-line-color="#3c90df"
                                              data-fill-color="transparent"
                                              data-spot-color="transparent"
                                              data-min-spot-color="transparent"
                                              data-max-spot-color="transparent"
                                              data-highlight-spot-color="#3c90df"
                                              data-highlight-line-color="#3c90df"
                                              data-tooltip-suffix="Projects"></span>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <p class="text-muted mb-0">
                                            ยอดขายประจำวัน
                                        </p>
                                        <p class="font-size-h3 font-w300 mb-0">
                                            {{ number_format($sum_d->sumprice,2,'.',',') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 col-xl-3 invisible" data-toggle="appear">
                            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <!-- Sparkline Dashboard Users Container -->
                                        <span class="js-sparkline" data-type="line"
                                              data-points="[340,330,360,340,360,350,370,360]"
                                              data-width="90px"
                                              data-height="40px"
                                              data-line-color="#82b54b"
                                              data-fill-color="transparent"
                                              data-spot-color="transparent"
                                              data-min-spot-color="transparent"
                                              data-max-spot-color="transparent"
                                              data-highlight-spot-color="#82b54b"
                                              data-highlight-line-color="#82b54b"
                                              data-tooltip-suffix="Users"></span>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <p class="text-muted mb-0">
                                            รายการขายประจำเดือน
                                        </p>
                                        <p class="font-size-h3 font-w300 mb-0">
                                            {{ number_format($list_m) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-6 col-xl-3 invisible" data-toggle="appear" data-timeout="400">
                            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <!-- Sparkline Dashboard Projects Container -->
                                        <span class="js-sparkline" data-type="line"
                                              data-points="[7,9,5,2,3,4,8,3]"
                                              data-width="90px"
                                              data-height="40px"
                                              data-line-color="#3c90df"
                                              data-fill-color="transparent"
                                              data-spot-color="transparent"
                                              data-min-spot-color="transparent"
                                              data-max-spot-color="transparent"
                                              data-highlight-spot-color="#3c90df"
                                              data-highlight-line-color="#3c90df"
                                              data-tooltip-suffix="Projects"></span>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <p class="text-muted mb-0">
                                            ยอดขายประจำเดือน
                                        </p>
                                        <p class="font-size-h3 font-w300 mb-0">
                                            {{ number_format($sum_m->sumprice,2,'.',',') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Quick Stats -->

                    

                </div>
                <!-- END Page Content -->
@endsection

@section('js_after')

        <!--
            Dashmix JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="{{ URL::asset('assets/js/dashmix.app.min.js') }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ URL::asset('assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/chart.js/Chart.bundle.min.js') }}"></script>

        <!-- Page JS Code -->
        <script src="{{ URL::asset('assets/js/pages/be_pages_dashboard.min.js') }}"></script>

        <!-- Page JS Helpers (jQuery Sparkline plugin) -->
        <script>jQuery(function(){ Dashmix.helpers('sparkline'); });</script>
@endsection