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
                                                    <table id="tb-pay-etc" class="table table-striped table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 60%;">รายละเอียดการชำระ</th>
                                                                <th class="text-center" style="width: 30%;">จำนวน</th>
                                                                <th class="text-center" style="width: 10%;">ลบ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="pay-etc">
                                                            
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td class="text-left">รวม</td>
                                                                <td class="text-center pay-total-footer">0</td>
                                                                <td class="text-center"></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="col-6">


                                                    <div class="form-group">
                                                        <h3 id="total-pay"></h3>
                                                        <input type="hidden" class="form-control sum_cash" value="" readonly id="pricetotal" name="pricetotal" >
                                                    </div>

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

                                                    <div class="form-group mt-4">
                                                        <label for="t_name">ส่วนลด</label>
                                                        <input type="decimal" class="form-control discount" value="0" onfocusout="input0()" onkeyup="torn()" id="discount" name="discount" maxlength="11">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="t_other_pay">ชำระเงินด้วยวิธีอื่น</label>
                                                        <input type="decimal" class="form-control" value="0" id="t_other_pay" name="t_other_pay" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="t_name">รับเงิน</label>
                                                        <input type="decimal" class="form-control getmoney" onkeyup="torn()"  id="getmoney" name="getmoney" maxlength="11">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="t_name">เงินทอน</label>
                                                        <input type="text" class="form-control input-lg" id="total" name="total" value="" readonly >
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    
                                    <!-- END Basic Elements -->
                
                            </div>
                            <div class="block-content block-content-full text-right bg-light">
                                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="pay()">
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

                        <input type="hidden" name="pay_discount" id="pay_discount" value="">
                        <input type="hidden" name="pay_getmoney" id="pay_getmoney" value="">

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

                        <button type="button" class="btn btn-success btn-block m-0" id="btn-pay" onclick="click_pay()">
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

    <!-- <script src="{{ asset('js/pos/product.js') }}"></script> -->
    <script type="text/javascript">

    $('document').ready(function(){
        let path = '{{ URL::to("sale/read-data/0") }}'
        //console.log(path);
        $.get(path, function(data){
            //console.log(data);
            $('#block-product').empty().html(data)                
        })

    })

    $(document).on('click','button.open_modal',function(){
        let path = $(this).attr('data-href');
        $.get(path, function(data){
            $('#modalAdd div.modal-content').html(data)
            $('#modalAdd').modal('show')
        })
    })

    // $('#b-credit').on('click', function(){
    //     let path = $(this).attr('data-href')
    //     openPayment(path)
    // })

    // $('#b-check').on('click', function(){
    //     let path = $(this).attr('data-href')
    //     openPaymentCreate(path)
    // })

    // $('#b-transfer').on('click', function(){
    //     let path = $(this).attr('data-href')
    //     openPayment(path)
    // })

    // function openPayment(path)
    // {
    //     $.get(path, function(data){
    //         $('#modal_payment').html(data)
    //     });
    //     $('#modalPayment').modal({
    //         show: true
    //     });
    // }

    // function openPaymentCreate(path)
    // {
    //     $.get(path, function(data){
    //         $('#modal_add').html(data)
    //     });
    //     $('#modalAdd').modal({
    //         show: true
    //     });
    // }

    $(document).on('show.bs.modal', '.modal', function (event) {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });

    // เพิ่มการจ่ายด้วยเงินโอน
    function bank_add()
    {
        let dt = time_create();

        let txt_amount = $('#t_bank_amount').val();

        let bb_id = "<input type='hidden' name='bank_id["+dt+"]' value=''>";
        let bank_id = "<input type='hidden' name='t_bank_id' value='" + $('#t_bank_id').val() + "'>";
        let bank_amount = "<input type='hidden' name='t_bank_amount' value='"+txt_amount+"'>";

        // จ่ายด้วยวิธีอื่นๆ
        // เพิ่ม hidden ของการจ่ายด้วยเงินโอน
        let oth_pay = $('.other-pay').html();
        let input_bank = "<div class='hidden-other-buy' id='bank"+dt+ "'>" + bb_id + bank_id + bank_amount + "</div>";
        $('.other-pay').empty().html(oth_pay + input_bank);

        // เพิ่มรายละเอียดการชำระ
        let pay_etc = $(".pay-etc").html();
        let pay_add = '<tr><td class="text-left">บัญชี '+ $('#t_bank_no').val() + '</td><td class="text-center">' + txt_amount + '</td><td class="text-center"><a  class="btn-del-other" other-amount="' + txt_amount + '" del_other="bank'+dt+ '"><i class="fa fa-trash text-danger"></i></a></td></tr>';
        $('.pay-etc').empty().html(pay_etc + pay_add);
        
        // รวมจำนวนเงินในรายละเอียดชำระ
        let pay_total = parseFloat($('.pay-total-footer').html()) + parseFloat(txt_amount);
        $('.pay-total-footer').html(pay_total);

        // รวมจำนวนเงินในชำระเงินด้วยวิธีอื่น
        $('#t_other_pay').val(pay_total);
    }

    // เพิ่มการจ่ายด้วยเช็ค
    function check_add()
    {
        let dt = time_create();

        let ck_id = "<input type='hidden' name='check_id["+dt+"]' value=''>";
        let ck_name = "<input type='hidden' name='check_name["+dt+"]' value='"+ $('#t_check_name').val() + "'>";
        let ck_branch = "<input type='hidden' name='check_branch["+dt+"]' value='"+ $('#t_check_branch').val() + "'>";
        let ck_number = "<input type='hidden' name='check_number["+dt+"]' value='"+ $('#t_check_number').val() + "'>";
        let ck_date = "<input type='hidden' name='check_date["+dt+"]' value='"+ $('#t_check_date').val() + "'>";
        let ck_no = "<input type='hidden' name='check_no["+dt+"]' value='"+ $('#t_check_no').val() + "'>";
        let ck_amount = "<input type='hidden' name='check_amount["+dt+"]' value='"+ $('#t_check_amount').val() + "'>";
        let ck_status = "<input type='hidden' name='check_status["+dt+"]' value='"+ $('#t_check_status').val() + "'>";

        // จ่ายด้วยวิธีอื่นๆ
        // เพิ่ม hidden ของการจ่ายด้วยเช็ค
        let oth_pay = $('.other-pay').html();
        let input_check = "<div class='hidden-other-buy' id='check"+dt+"'>" + ck_id + ck_name + ck_branch + ck_number + ck_date + ck_no + ck_amount + ck_status + "</div>";
        $('.other-pay').empty().html(oth_pay + input_check);

        // เพิ่มรายละเอียดการชำระ
        let pay_etc = $(".pay-etc").html();
        let pay_add = '<tr><td class="text-left">เช็ค '+ $('#t_check_number').val() + '</td><td class="text-center">' + $('#t_check_amount').val() + '</td><td class="text-center"><a  class="btn-del-other" other-amount="' + $('#t_check_amount').val() + '" del_other="check'+dt+ '"><i class="fa fa-trash text-danger"></i></a></td></tr>';
        $('.pay-etc').empty().html(pay_etc + pay_add);
        
        // รวมจำนวนเงินในรายละเอียดชำระ
        let pay_total = parseFloat($('.pay-total-footer').html()) + parseFloat($('#t_check_amount').val());
        $('.pay-total-footer').html(pay_total);

        // รวมจำนวนเงินในชำระเงินด้วยวิธีอื่น
        $('#t_other_pay').val(pay_total);
    }

    // สร้างเวลาสำหรับระบุใน array ชำระด้วยวิธีอื่น
    function time_create()
    {
        let dt = new Date($.now());
        let time = dt.getHours().toString() + dt.getMinutes().toString() + dt.getSeconds().toString();
        return time;
    }

    // เพิ่มการจ่ายด้วยบัตรเครดิต
    function credit_add()
    {      
        let dt = time_create();

        let c_id = "<input type='hidden' name='credit_id["+dt+"]' value='"+ $('#t_credit_id').val() + "'>";
        let c_name = "<input type='hidden' name='credit_name["+dt+"]' value='"+ $('#t_credit_name').val() + "'>";
        let c_no = "<input type='hidden' name='credit_no["+dt+"]' value='"+ $('#t_credit_no').val() + "'>";
        let c_expired = "<input type='hidden' name='credit_expired["+dt+"]' value='"+ $('#t_credit_expired').val() + "'>";
        let c_installment = "<input type='hidden' name='credit_installment' value='"+ $('#t_credit_installment').val() + "'>";
        let c_isim = "<input type='hidden' name='credit_isim["+dt+"]' value='"+ $('#t_credit_isim').val() + "'>";
        let c_pay = "<input type='hidden' name='credit_pay["+dt+"]' value='"+ $('#t_credit_pay').val() + "'>";
        let c_free = "<input type='hidden' name='credit_free["+dt+"]' value='"+ $('#t_credit_free').val() + "'>";
        let c_freepay = "<input type='hidden' name='credit_freepay["+dt+"]' value='"+ $('#t_credit_freepay').val() + "'>";
        let c_total = "<input type='hidden' name='credit_total["+dt+"]' value='"+ $('#t_credit_total').val() + "'>";

        // จ่ายด้วยวิธีอื่นๆ
        // เพิ่ม hidden ของการจ่ายด้วยบัตรเครดิต
        let oth_pay = $('.other-pay').html();
        let input_credit = "<div class='hidden-other-buy' id='credit"+dt+"'>" + c_id + c_name + c_no + c_expired + c_installment + c_isim + c_pay + c_free + c_freepay + c_total + "</div>";
        $('.other-pay').empty().html(oth_pay + input_credit);

        // เพิ่มรายละเอียดการชำระ
        let pay_etc = $(".pay-etc").html();
        let pay_add = '<tr><td class="text-left">บัตร ' + $('#t_credit_name').val() + '</td><td class="text-center">' + $('#t_credit_pay').val() + '</td><td class="text-center"><a  class="btn-del-other" other-amount="' + $('#t_credit_pay').val() + '" del_other="credit'+dt+'"><i class="fa fa-trash text-danger"></i></a></td></tr>';
        $('.pay-etc').empty().html(pay_etc + pay_add);
        
        // รวมจำนวนเงินในรายละเอียดชำระ
        let pay_total = parseFloat($('.pay-total-footer').html()) + parseFloat($('#t_credit_pay').val());
        $('.pay-total-footer').html(pay_total);

        // รวมจำนวนเงินในชำระเงินด้วยวิธีอื่น
        $('#t_other_pay').val(pay_total);
    }

    // $('.category').on('click', '.btn_cat', function(){
    //     let catid = $('.btn_cat').val();
    //     console.log(catid);
    //     // $.get(catid, function(data){
    //     //     $('#block-product').empty().html(data)                
    //     // })
    // })

    function click_pay()
    {
        let path = "{{ URL('salebill_product') }}";
        $.get(path, $('#frm-basket').serialize(), function(data){
            
            var count = Object.keys(data).length;
            //console.log(count);
            if(count){
                $.each( data, function( key, value){
                    Dashmix.helpers('notify', {type: 'warning', icon: 'fa fa-exclamation mr-1', message: key + ' มีจำนวนคงเหลือ ' + value});
                });
            }else{
                //jQuery('#modalPay').modal('show');
                $('#modalPay').modal({
                    show: true
                })
                let total_pay = $('#sum_cash').html();
                //console.log(total_pay);
                $('#total-pay').html('รวม : ' + total_pay);
                $('#pricetotal').val(total_pay);
            }
        });

    }

    // กดปุ่มชำระเงิน
    function pay()
    {
        let path = "{{ URL('salebill_product') }}";
        $.get(path, $('#frm-basket').serialize(), function(data){
            
            var count = Object.keys(data).length;
            
            if(count){
                $.each( data, function( key, value){
                    jQuery('#modalPay').modal('hide');
                    Dashmix.helpers('notify', {type: 'warning', icon: 'fa fa-exclamation mr-1', message: key + ' มีจำนวนคงเหลือ ' + value});
                });
            }else{
                $("#frm-basket").submit();
                // let path = "{{ URL('salebill_pay') }}";
                // console.log(path);
                // $.get(path, $('#frm-basket').serialize(), function(data){
                //     console.log(data);
                //     jQuery('#modalPay').modal('hide');
                //     $('#list_body').empty();
                //     $('.sum_cash').html(0);
                // });
            }
        });

    }

    function cal_credit_pay()
    {
        let pay = $('#t_credit_pay').val();
        let free = $('#t_credit_free').val();

        let freepay = (parseFloat(pay) * parseFloat(free)) / 100;
        $('#t_credit_freepay').val(freepay);

        let total = parseFloat(pay) + parseFloat(freepay);
        $('#t_credit_total').val(total);
    }

    function torn()
    {
        let a = $("#pricetotal").val();
        let b = $("#discount").val();
        let c = $("#getmoney").val();
        let e = $("#t_other_pay").val();
        let d = parseFloat(c) - parseFloat(a) + parseFloat(b) + parseFloat(e);

        $("#total").val(d);
        $("#pay_discount").val(b);
        $("#pay_getmoney").val(c);
    }

    function get_cash(num)
    {
        let money = $('#getmoney').val();
        if(money == ''){
            money = 0;
        }
        let tt_money = parseFloat(num) + parseFloat(money);
        $('#getmoney').val(tt_money);
        torn();
    }

    function get_balance()
    {
        let money = $('#pricetotal').val();
        let dis = $("#discount").val();
        let other = $("#t_other_pay").val();
        let total = parseFloat(money) - parseFloat(dis) - parseFloat(other);
        $('#getmoney').val(total);
        torn();
    }

    function get_clear()
    {
        $('#getmoney').val(0);
        $('#total').val(0);
    }




    function click_cat(id)
    {
        let catid = $('#btncat'+id).attr("get_cat");
        //let cat = $('#btncat'+id).attr("class");
        //console.log(cat);
        $('.btn-cat').attr('class','p-3 btn btn-square btn-outline-info btn-cat');
        $('#btncat'+id).attr('class','p-3 btn btn-square btn-hero-info btn-cat');
        $.get(catid, function(data){
            $('#block-product').empty().html(data)                
        })
    }

    function click_product(id)
    {
        let pid = $('#pid'+id).attr("get_product");
        let list = $('#list_body').html();
        let search_id = $(list).find('#num'+id).html();

        let list_prod = $('#list_product').html();

        if(search_id){
            let num = parseInt(search_id) + 1;
            $('#num'+id).html(num);
            $('#psn'+id).val(num);
            Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: 'เพิ่มสินค้าแล้ว'});
                
            sum_total(id);
            clear_all();

        }else{
        
            $.get(pid, function(txt){
                list += txt;
                $('#list_body').html(list);

                Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: 'เพิ่มสินค้าแล้ว'});
                
                sum_total(id);
                clear_all();
            })            
        }

    }

    function click_product_sn(id)
    {
        let pid = $('#pid'+id).attr("get_product");
        let list = $('#list_body').html();
        let search_id = $(list).find('#num'+id).html();

        let list_prod = $('#list_product').html();

        if(search_id){
            Dashmix.helpers('notify', {type: 'warning', icon: 'fa fa-exclamation mr-1', message: 'เป็นสินค้าที่ไม่สามารถเพิ่มรายการซ้ำได้'});
            clear_all();
        }else{
        
            $.get(pid, function(txt){
                list += txt;
                $('#list_body').html(list);

                Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: 'เพิ่มสินค้าแล้ว'});
                
                sum_total(id);
                clear_all();
            })            
        }

    }

    function sum_total(id)
    {
        let sumcash = $('#sum_cash').html();
        let price = $('#price'+id).html();
        let total = parseFloat(sumcash) + parseFloat(price);
        $('.sum_cash').html(total);
    }

    function list_del()
    {
        $('#list_body').empty();
        $('.sum_cash').html(0);
        $('.other-pay').empty();
        $('.pay-etc').empty();
        Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'ลบรายการทั้งหมดแล้ว'});
    }

    function del_one(pssn)
    {
        let pnum = $('#num'+pssn).html();
        let pprice = $('#price'+pssn).html();
        let sumcash = $('#sum_cash').html();
        let total = parseFloat(sumcash) - (parseFloat(pnum) * parseFloat(pprice));
        $('.sum_cash').html(total);
        //console.log(pnum);

        let tr = $('#num'+pssn).closest('tr');
        tr.remove();
        Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'ลบแล้ว'});
        //console.log(tr);

    }

    // ปุ่มลบ ของการชำระเงินด้วยวิธีอื่นๆ
    $(document).on('click','.btn-del-other',function(){
        let amount = $(this).attr('other-amount');
        let no = $(this).attr('del_other'); 

        // รวมจำนวนเงินในรายละเอียดชำระ
        let pay_total = parseFloat($('.pay-total-footer').html()) - parseFloat(amount);
        $('.pay-total-footer').html(pay_total);

        // รวมจำนวนเงินในชำระเงินด้วยวิธีอื่น
        $('#t_other_pay').val(pay_total);

        let tr = $(this).closest('tr');
        tr.remove();

        let div = $('#'+no).closest('div');
        div.remove();

        Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'ลบแล้ว'});
    })

    // $('#list_body').on('click','.btn-del',function(e){
    //     e.preventDefault();
    // })

    $('#t_search').on('keyup',function(){
        if($(this).val() == ""){
            console.log('ว่าง');
            clear_all();
        }
        // if(e.which == 13){
        //     let txt = $('#t_search').val();
        //     console.log(txt);
        // }
    })

    $('#t_search').on('keydown',function(e){
        if(e.which == 8){
            console.log('ลบ');
            $('#t_sn').val(''); 
            $('#t_ck').val('');
            $('#t_pid').val('');
        }
    })


    $('#frm_barcode').on('submit',function(e){
        e.preventDefault(); 
        let list = $('#list_body').html();  // รายการสินค้าที่มีอยู่
        let tsn = $('#t_sn').val(); // ps_sn
        let tck = $('#t_ck').val(); // p_sn 0/1
        let tpid = $('#t_pid').val(); // p_id
        let tname = $('#t_search').val(); // p_name
        let sn;

        if((tck == '') && (tpid == '') && (tsn == '')){
            console.log(tck);
            console.log(tpid);
            console.log(tsn);
            // ไม่ได้รับค่าจาก autocomplete
            // เช็คและเพิ่มรายการสินค้าได้เลย

            add_product(tname);
        }else{
            console.log(tck);
            console.log(tpid);
            console.log(tsn);
            // ได้รับค่าจาก autocomplete
            
            if(tck == '1'){
                // เป็นสินค้า sn
                // แสดง model เลือกรหัสสินค้า

                let path = "{{ URL::to('sale/get_sn') }}"+'/'+tname;
                console.log(path);
                jQuery('#modalForm').modal('show',function(){
                    $.get(path, function(data){
                        $('#modal_content').html(data); 
                        console.log(data);
                    });
                });
            }else{
                // ไม่ใช่สินค้า sn
                // เช็คและเพิ่มรายการสินค้าได้เลย

                add_product(tsn);
            }
        }

        // ------ ของเดิม ------
        // if(tsn){
        //     sn = $('#t_sn').val();   
        //     if(tck == '0'){
        //         add_product(sn);
        //     }else{

        //         let path = "{{ URL::to('sale/get_sn') }}"+'/'+tpid;
        //         jQuery('#modalForm').modal('show',function(){
        //             $.get(path, function(data){
        //                 //console.log(data);  
        //                 $('#modal_content').html(data); 
        //             });
        //         });
        //     }
            
        // }else{
        //     sn = $('#t_search').val();  
        //     add_product(sn);
        // }       
        //  ------------
        
    })

    function add_product(sn){

        $.get("{{ URL::to('sale/check-barcode') }}"+'/'+sn, function(num){
            //console.log(num);
            if(num > 0){
                click_product(sn);
                clear_all();
            }else{   
                Dashmix.helpers('notify', {type: 'warning', icon: 'fa fa-times mr-1', message: 'ไม่พบสินค้ารหัส '+sn});
                clear_all();
            }                
        })
    }

    function clear_all(){
        // $('#t_search').val('');
        // $('#t_sn').val(''); 
        // $('#t_ck').val('');
        // $('#t_pid').val('');
        $('.clear_end').val('');
        $('#t_search').focus();
    }

    // autocomplete

    $('#t_search').autocomplete({
    source : '{{ URL::to("autocomplete") }}',
    minlenght:1,
    autoFocus:true,
    select:function(e,ui){
        $('#t_search').val(ui.item.value);  // p_name
        $('#t_ck').val(ui.item.ck);  // p_sn
        $('#t_pid').val(ui.item.pid);  // p_id
        $('#t_sn').val(ui.item.id);   // ps_sn        
    }
    });

    // $('#frm_barcode').submit(function(e){
    //     e.preventDefault();
    //     let tsn = $('#t_sn').val();
    // });


    
    </script>
@endsection