@extends('layouts.pos')

@section('css')
    <style>
        .loading {
            background: lightgrey;
            padding: 15px;
            position: fixed;
            border-radius: 4px;
            left: 50%;
            top: 50%;
            text-align: center;
            margin: -40px 0 0 -50px;
            z-index: 2000;
            display: none;
        }

        a, a:hover {
            color: white;
        }

        .form-group.required label:after {
            content: " *";
            color: red;
            font-weight: bold;
        }
        
        .payScroll {
        height:200px;
        overflow-y: scroll;
        }
        
        .productScroll {
        height:500px;
        overflow-y: scroll;
        }
        
        .catScroll {
        height:80px;
        width: 100%;
        overflow-x: scroll;
        }
        
        .shopScroll {
        height:400px;
        overflow-y: scroll;
        }



        .ui-autocomplete {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0;
        margin: 2px 0 0;
        list-style: none;
        font-size: 14px;
        text-align: left;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 4px;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        background-clip: padding-box;
        }

        .ui-autocomplete > li > div {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: normal;
        line-height: 1.42857143;
        color: #333333;
        white-space: nowrap;
        }

        .ui-state-hover,
        .ui-state-active,
        .ui-state-focus {
        text-decoration: none;
        color: #262626;
        background-color: #f5f5f5;
        cursor: pointer;
        }

        .ui-helper-hidden-accessible {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
        }

    </style>

@endsection

@section('content')


<!-- Fade In Block Modal (เลือก sn สินค้า )-->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="modal_content"></div>
    </div>
</div>
<!-- END Fade In Block Modal -->


<!-- Fade In Block Modal -->
<div class="modal fade" id="modalPay">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="modal_content_pay">


                    <!-- Your Block -->
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">ชำระเงิน</h3>
                                <div class="block-options">
                                    {!! date("d/m/Y H:i") !!}
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">

                                    <!-- Basic Elements -->
                                    <div class="row push">
                                        <div class="col-lg-12 col-xl-12">

                                            <div class="row">
                                                <div class="col-6">

                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label" >รวมเงิน</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control sum_cash text-right text-primary" value="" readonly id="pricetotal" name="pricetotal" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label" >ส่วนลด</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control discount text-right" value="0" onfocusout="input0()" onkeyup="torn()" id="discount" name="discount" maxlength="11">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label" >รวมเงินที่ต้องชำระ</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control sum_cash_all text-right text-danger" value="" readonly id="pricetotal_all" name="pricetotal_all" >
                                                        </div>
                                                    </div>

                                                    <div class="payScroll">
                                                    <table id="tb-pay-etc" class="table table-striped table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 60%;">รายการชำระเงิน</th>
                                                                <th class="text-center" style="width: 30%;">จำนวน</th>
                                                                <th class="text-center" style="width: 10%;">ลบ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="pay-etc">
                                                            
                                                        </tbody>
                                                        
                                                    </table>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label" >รวม</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control pay-total-footer text-right" value="0" readonly id="pay-total-footer" name="pay-total-footer" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-6 col-form-label" >เงินทอน</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control pay-change-footer text-right text-danger" value="0" readonly id="pay-change-footer" name="pay-change-footer" >
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-6">


                                                    <div class="form-group mb-2">
                                                        <label for="">ชำระโดยเงินสด</label>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="button" class="m-1 btn btn-square btn-hero-success" onclick="get_cash(20)">20</button>
                                                            <button type="button" class="m-1 btn btn-square btn-hero-info" onclick="get_cash(50)">50</button>
                                                            <button type="button" class="m-1 btn btn-square btn-hero-danger" onclick="get_cash(100)">100</button>
                                                            <button type="button" class="m-1 btn btn-square btn-hero-primary" onclick="get_cash(500)">500</button>
                                                            <button type="button" class="m-1 btn btn-square btn-hero-secondary" onclick="get_cash(1000)">1000</button>
                                                            <button type="button" class="m-1 btn btn-square btn-hero-success" onclick="get_balance()">พอดี</button>
                                                            <button type="button" class="m-1 btn btn-square btn-outline-danger" onclick="get_clear()">ล้าง</button>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="t_name">รับเงิน</label>
                                                        <input type="decimal" class="form-control getmoney text-right" onkeyup="torn()"  id="getmoney" name="getmoney" maxlength="11" value="0">
                                                    </div>

                                                    <div class="form-group m-2">
                                                        <label for="">ชำระโดยวิธีอื่น</label>
                                                    </div>
        
                                                    <div class="row">
                                                        <div class="col-12">
        
                                                            <button type="button" class="btn btn-outline-info open_modal" id="b-credit" data-href="{{ url('payment/add/credit') }}"><small>บัตรเครดิต</small></button>
        
                                                            <button type="button" class="btn btn-outline-info open_modal" id="b-check" data-href="{{ url('payment/add/check') }}"><small>เช็ค</small></button>
        
                                                            <button type="button" class="btn btn-outline-info open_modal" id="b-transfer" data-href="{{ url('payment/add/transfer') }}"><small>เงินโอน</small></button>
                                                            
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    
                                    <!-- END Basic Elements -->
                
                            </div>
                            <div class="block-content block-content-full text-right bg-light">
                                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="btn-save" disabled="" onclick="pay()" txt="{{ URL('salebill_product') }}">
                                    <i class="fa fa-print"></i>
                                    บันทึก / พิมพ์</button>
                            </div>
                


                        </div>
                        <!-- END Your Block -->



            </div>
        </div>
    </div>
    <!-- END Fade In Block Modal -->



<!-- Fade In Block Modal (เลือกวิธีชำระเงิน )-->
<div class="modal fade" id="modalPayment">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modal_payment"></div>
    </div>
</div>
<!-- END Fade In Block Modal -->


<!-- Fade In Block Modal (ใส่ข้อมูลการชำระ )-->
<div class="modal fade" id="modalAdd">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="modal_add"></div>
        </div>
    </div>
    <!-- END Fade In Block Modal -->


    <!-- Page Content -->
    <div class="content p-1">
        
    <div class="row">
        <div class="col-sm-4 p-1">
            
            <div class="row mb-1">
                <div class="col-12">
                            
                <div class="block block-rounded bg-gd-aqua mb-0">
                    <div class="block-content d-flex align-items-center justify-content-between">
                            <div class="h3 text-white-75"><i class="fa fa-money-bill-wave-alt"></i> จำนวนเงิน</div>
                        <div class="ml-3 text-right">
                            <p>
                                <div id="sum_cash" class="text-white h2 sum_cash">0</div>
                            </p>
                        </div>
                    </div>
                </div>

                </div>
            </div>

            <div class="row mt-2 mb-0">
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">
                            <label class="pull-right" for="">แสกนบาร์โค้ด</label>  
                        </div>
                        <div class="col-8">
                            <div class="form-group">                            
                                <form name="frm_barcode" id="frm_barcode">
                                    <input type="hidden" id="t_sn" value="" class="clear_end">
                                    <input type="hidden" id="t_ck" value="" class="clear_end">
                                    <input type="hidden" id="t_pid" value="" class="clear_end">
                                <div class="input-group mb-2">
                                    <input type="text" class="typeahead form-control clear_end" id="t_search" name="t_search" placeholder="ค้นหา" autofocus>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                </form>
                            </div>   
                        </div>   
                    </div>            
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                <!-- Small Table -->
                <div class="block block-rounded block-bordered">
                    <div class="block-content p-2 shopScroll">

                        <form action="salebill_pay" name="frm-basket" id="frm-basket" method="POST">
                        {{ csrf_field() }}  

                        <input type="hidden" name="pay_discount" id="pay_discount" value="0">
                        <input type="hidden" name="pay_getmoney" id="pay_getmoney" value="0">
                        <input type="hidden" name="pay_total" id="pay_total" value="0">
                        <input type="hidden" name="pay_change" id="pay_change" value="0">

                        <!-- จ่ายด้วยวิธีอื่นๆ -->
                        <div class="other-pay"></div>
                        <!-- end จ่ายด้วยวิธีอื่นๆ -->

                        <table class="table table-striped table-hover table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 70%;">ชื่อสินค้า</th>
                                    <th class="text-center" style="width: 10%;">#</th>
                                    <th class="text-center" style="width: 10%;">ราคา</th>
                                    <th class="text-center" style="width: 10%;">ลบ</th>
                                </tr>
                            </thead>
                            <tbody id="list_body"></tbody>
                        </table>

                        </form>
                        
                    </div>
                    

                </div>
                <!-- END Small Table -->

                
                </div>
            </div>
            <div class="row">
                <div class="col-12">

                        <button type="button" class="btn btn-success btn-block m-0" id="btn-pay" txt="{{ URL('salebill_product') }}" onclick="click_pay()">
                            <i class="fa fa-money-bill-wave-alt"></i> ชำระเงิน
                        </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    
                    <a href="#" class="text-danger pull-right" onclick="list_del()">
                        <i class="fa fa-trash"></i> ลบทั้งหมด
                    </a>
                </div>
            </div>

        </div>


        <div class="col-sm-8 p-1">

                          
                <div class="block block-rounded block-bordered">
                    
                    <!-- Slider with multiple images and center mode -->
                    <div class="block">
                        <div class="js-slider slick-nav-black slick-nav-hover" data-dots="false" data-arrows="true" data-slides-to-show="10" data-center-mode="false" data-autoplay="false" data-autoplay-speed="3000">
                            <div>
                                <button type="button" class="btn btn-square btn-hero-info btn-cat img-fluid" id="btncat0" get_cat="{{ URL::to('sale/read-data/0') }}" onclick="click_cat(0)">ทั้งหมด</button>
                            </div>
                                @foreach($scat as $scat)
                            <div>   
                                <button type="button" class="btn btn-square btn-outline-info btn-cat img-fluid" id="btncat{{ $scat->cat_id }}" get_cat="{{ URL::to('sale/read-data/'.$scat->cat_id) }}" onclick="click_cat({{ $scat->cat_id }})">{{ $scat->cat_name }}</button>
                            </div>
                                @endforeach
                        </div>
                    </div>
                    <!-- END Slider with multiple images and center mode -->


                        <div class="block-content p-1 productScroll" id="block-product">
                            
                        </div>
                </div>







    
            </div>
    </div>

    </div>
    <!-- END Page Content -->


    <div class="loading">
        <i class="fa fa-4x fa-cog fa-spin text-info"></i><br/>
        <span>Loading</span>
    </div>

@endsection

@section('css_before')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
    
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/select2/css/select2.min.css') }}">
    
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/slick-carousel/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/slick-carousel/slick-theme.css') }}">
@endsection

@section('js_after')

    <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
    <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>

    <script src="{{ URL::asset('assets/js/dashmix.core.min.js') }}"></script>
    
    <script src="{{ URL::asset('assets/js/dashmix.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ URL::asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>


    <!-- Page JS Code -->
    <script src="{{ URL::asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/slick-carousel/slick.min.js') }}"></script>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
    


@endsection


@section('js')
    <script src="{{asset('js/ajax-crud-modal-form.js')}}"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>jQuery(function(){ Dashmix.helpers('slick'); });</script>
    <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs','notify']); });</script>
@endsection


@section('script')

    <script src="{{ asset('js/pos/product.js') }}"></script>
    
    <script type="text/javascript">

        $('document').ready(function(){
            let path = '{{ URL::to("sale/read-data/0") }}';
            $.get(path, function(data){
                $('#block-product').empty().html(data)                
            })
        })

    </script> -->
@endsection