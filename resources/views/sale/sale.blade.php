@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">ชำระเงิน</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <a href="{{ url('sale') }}">
                            <button type="button" class="btn btn-warning">
                                <i class="fa fa-plus"></i> ซื้อเพิ่ม
                            </button>
                        </a>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">

        <div class="row">

            <div class="col-lg-8 col-xl-8">


                    <!-- Small Table -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">รายการสินค้า</h3>
                            <div class="block-options">
                                <div class="block-options-item">
                                        <a href="{{ url('/sale/cancel_all') }}"><button type="button" class="btn btn-danger">ยกเลิกการขาย</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="block-content">
                            <table class="table table-striped table-hover table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">#</th>
                                        <th class="text-center" style="width: 15%;">รหัสสินค้า</th>
                                        <th class="text-center" style="width: 35%;">ชื่อสินค้า</th>
                                        <th class="text-center" style="width: 5%;">จำนวน</th>
                                        <th class="text-center" style="width: 15%;">ราคา/ชิ้น</th>
                                        <th class="text-center" style="width: 20%;">ขาย/ชิ้น</th>
                                        <th class="text-center" style="width: 5%;">ยกเลิก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? $i = '1'; ?>
                                    @foreach($sale as $sale)

                                    <tr>
                                        <th class="text-center" scope="row">{{ $i++ }}</th>
                                        <td class="text-left">{{ $sale->s_barcode }}</td>
                                        <td class="text-left">{{ $sale->s_pname }}</td>
                                        <td class="text-center">{{ $sale->s_num }}</td>
                                        <td class="text-center">{{ $sale->s_price }}</td>
                                        <td class="text-center">
    
                                                {!! Form::open(array('url'=>'sale')) !!}
                
                                                {{ csrf_field() }}  
                                                <input type="hidden" name="h_sid" value="{{$sale->s_id}}">
                                                <input type="hidden" name="ck" value="upd_price">

                                                <div class="input-group">
                                                    <input type="text" class="form-control from-control-sm" id="t_newprice" name="t_newprice">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-sync"></i></button>
                                                    </div>
                                                </div>

                                                {!! Form::close() !!}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ url('/sale/cancel/'.$sale->s_id.'/'.$sale->s_psid) }}">
                                                <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Small Table -->


            </div>
            <div class="col-lg-4 col-xl-4">
                    



                    <!-- Your Block -->
                    <div class="block block-rounded block-bordered">
                            <div class="block-content">

                                    <!-- Basic Elements -->
                                    <h2 class="content-heading pt-0">ชำระเงิน</h2>
                                    <div class="row push">
                                        <div class="col-lg-12 col-xl-12">

                                    {!! Form::open(array('url'=>'salebill')) !!}    
                                    {{ csrf_field() }}  
                                    <input type="hidden" name="ck" value="pay">
                                    
                                            
                                            <div class="form-group">
                                                <label for="t_name">รวม</label>
                                                <h3>{{ number_format($sum->sumprice, 2,'.',',') }}</h3>
                                                <input type="hidden" class="form-control " value="{{ $sum->sumprice }}" readonly id="pricetotal" name="pricetotal" >
                                            </div>
                                            <div class="form-group">
                                                <label for="t_name">ส่วนลด</label>
                                                <input type="decimal" class="form-control" value="0" onfocusout="input0()" onkeyup="torn()" id="discount" name="discount" maxlength="11">
                                            </div>
                                            <div class="form-group">
                                                <label for="t_name">รับเงิน</label>
                                                <input type="decimal" class="form-control" onkeyup="torn()"  id="getmoney" name="getmoney" maxlength="11">
                                            </div>
                                            <div class="form-group">
                                                <label for="t_name">เงินทอน</label>
                                                <input type="text" class="form-control input-lg" id="total" name="total" value="" readonly >
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                            
                                                    
                                                </div>

                                                <div class="col-6 text-right">
                                                    
                                            <div class="form-group">
                                                    {!! Form::submit('ชำระเงิน', ['class'=>'btn btn-success']); !!}
                                            </div>
                                                </div>
                                            </div>
                
                                    {!! Form::close() !!}
                                        </div>
                                    </div>
                                    
                                    
                                    <!-- END Basic Elements -->
                
                            </div>
                        </div>
                        <!-- END Your Block -->

            </div>


        </div>

    </div>
    <!-- END Page Content -->
@endsection

@section('css_before')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
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

@endsection


@section('script')

    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });
    </script>

<script type="text/javascript">

    function torn()
    {
        var a = document.getElementById("pricetotal");
        var b = document.getElementById("discount");
        var c = document.getElementById("getmoney");
        var d = parseFloat(c.value) - parseFloat(a.value) + parseFloat(b.value);

        document.getElementById("total").value=d;

    }

    function input0()
    {
        if(!document.getElementById("discount").value.match(/\d+/))
        {
            document.getElementById("discount").value = 0;
        }

        torn();
    }
</script>

@endsection