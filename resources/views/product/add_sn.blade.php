{!! Form::open(array('url'=>'productsn', 'OnSubmit'=>'return fncSubmit_addsn();', 'name'=>'form1', 'role'=>'form1')) !!}

<div class="block block-themed block-transparent mb-0">
<div class="block-header bg-primary-dark">
    <h3 class="block-title">เพิ่มสินค้า : {{ $data->p_name }}</h3>
    <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-fw fa-times"></i>
        </button>
    </div>
</div>
<div class="block-content">
    <p>
        
        {{ csrf_field() }}

        <input name="ck" type="hidden" value="add_sn">
        {{ Form::hidden('h_pid', $data->p_id) }}
        
    <div class="text-center"><img src="{{ asset('images_product/resize/'.$data->p_image) }}"></div>


    <!-- Block Tabs Default Style -->
    <div class="block block-rounded block-bordered">
        <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
            <li role="presentation" class="nav-item active">
                <a class="nav-link text-primary" href="#tab-import" aria-controls="tab-import" role="tab"
                data-toggle="tab">นำเข้าสินค้า</a>
            </li>
            <li role="presentation" class="nav-item">
                <a class="nav-link text-primary" href="#tab-serial" aria-controls="tab-serial" role="tab"
                data-toggle="tab">รหัสสินค้า</a>
            </li>
        </ul>
        
        <div class="block-content tab-content">
            

            <div role="tabpanel" class="tab-pane active" id="tab-import">
                <p>
                    
                    <div class="row">
                        <div class="col-sm-12">
                
                        <div class="form-group row">
                            {!! Form::label('t_cost','ราคาทุนต่อหน่วย', ['class'=>'col-sm-4 col-form-label']); !!}
                            <div class="col-sm-8">
                            <input class="form-control" name="t_cost" type="text" placeholder="ระบุราคาทุน เช่น 200" maxlength="11" onkeypress="CheckNum()">
                            </div>
                        </div>
                
                        <div class="form-group row">
                            {!! Form::label('t_date','วันหมดอายุ', ['class'=>'col-sm-4 col-form-label']); !!}
                            <div class="col-sm-8">
                            <input type="text" class="js-datepicker form-control" id="t_date" name="t_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                
                        <div class="form-group row">
                            {!! Form::label('t_alert','เตือนก่อนหมดอายุ', ['class'=>'col-sm-4 col-form-label']); !!}
                            <div class="col-sm-8">
                            <input class="form-control" name="t_alert" type="text" placeholder="(ถ้ามี) ระบุจำนวนวัน เช่น 5" maxlength="4" onkeypress="CheckNum()">
                            </div>
                        </div>
                
                        <div class="form-group row">
                            {!! Form::label('t_claim','รับประกัน(วัน)', ['class'=>'col-sm-4 col-form-label']); !!}
                            <div class="col-sm-8">
                            <input class="form-control" name="t_claim" type="text" placeholder="(ถ้ามี) ระบุจำนวนวัน เช่น 365" maxlength="5" onkeypress="CheckNum()">
                            </div>
                        </div>
                
                        <div class="form-group row">
                            {!! Form::label('s_sup','ผู้ผลิต', ['class'=>'col-sm-4 col-form-label']); !!}
                            <div class="col-sm-8">
                            {!! Form::select('s_sup', $ssup, 'null', ['class'=>'form-control', 'placeholder'=>'- เลือกผู้ผลิต -']); !!}
                            </div>
                        </div>
                
                
                
                        </div>
                    </div>
                
                        
                </p>
            </div>

            <div role="tabpanel" class="tab-pane" id="tab-serial">
                <p>
                    
                        <div class="row">
                            <div class="col-sm-6">
                    
                                <div class="form-group">  
                                    <div class="table-responsive">  
                                         <table class="table table-bordered" id="dynamic_field">  
                                              <tr>  
                                                   <td><input type="text" name="sn[]" class="form-control form-control-sm" /></td>  
                                                   <td class="text-center"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-sm"><i class="fa fa-trash"></i></button></td>  
                                              </tr>    
                                         </table>  
                                         <button type="button" name="add" id="add" class="btn btn-success">เพิ่มอีก</button>
                                    </div>  
                                </div> 
                    
                    
                            </div>
                        </div>
                                      
                </p>
            </div>


        </div>
    </div>

        </p>
    </div>
    <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
        {!! Form::submit('เพิ่ม', ['class'=>'btn btn-primary']); !!}
    </div>
</div>
        {!! Form::close() !!}



<script>  
$(document).ready(function(){  
        var i=1;  
        $('#add').click(function(){  
            i++;  
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="sn[]" class="form-control form-control-sm" /></td><td class="text-center"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-sm"><i class="fa fa-trash"></i></button></td></tr>');  
        });  
        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });   
});  
</script>


{{-- 
{!! Form::open(array('url'=>'productsn', 'OnSubmit'=>'return fncSubmit_addsn();', 'name'=>'form1', 'role'=>'form1')) !!}

<div class="block block-themed block-transparent mb-0">
<div class="block-header bg-primary-dark">
    <h3 class="block-title">เพิ่มสินค้า : {{ $data->p_name }}</h3>
    <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-fw fa-times"></i>
        </button>
    </div>
</div>
<div class="block-content">
    <p>
        
        {{ csrf_field() }}

        <input name="ck" type="hidden" value="add_sn">
        {{ Form::hidden('h_pid', $data->p_id) }}
        
    <div class="text-center"><img src="{{ asset('images_product/resize/'.$data->p_image) }}"></div>


    <h2 class="content-heading">ข้อมูลสินค้า Serial number</h2>
    <div class="row">
        <div class="col-sm-12">
            

        <div class="form-group row">
            {!! Form::label('t_cost','ราคาทุนต่อหน่วย', ['class'=>'col-sm-4 col-form-label']); !!}
            <div class="col-sm-8">
            <input class="form-control" name="t_cost" type="text" placeholder="ระบุราคาทุน เช่น 200" maxlength="11" onkeypress="CheckNum()">
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('t_date','วันหมดอายุ', ['class'=>'col-sm-4 col-form-label']); !!}
            <div class="col-sm-8">
            <input type="text" class="js-datepicker form-control" id="t_date" name="t_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('t_alert','เตือนก่อนหมดอายุ', ['class'=>'col-sm-4 col-form-label']); !!}
            <div class="col-sm-8">
            <input class="form-control" name="t_alert" type="text" placeholder="(ถ้ามี) ระบุจำนวนวัน เช่น 5" maxlength="3" onkeypress="CheckNum()">
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('t_claim','รับประกัน(วัน)', ['class'=>'col-sm-4 col-form-label']); !!}
            <div class="col-sm-8">
            <input class="form-control" name="t_claim" type="text" placeholder="(ถ้ามี) ระบุจำนวนวัน เช่น 365" maxlength="4" onkeypress="CheckNum()">
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('s_sup','ผู้ผลิต', ['class'=>'col-sm-4 col-form-label']); !!}
            <div class="col-sm-8">
            {!! Form::select('s_sup', $ssup, 'null', ['class'=>'form-control', 'placeholder'=>'- เลือกผู้ผลิต -']); !!}
            </div>
        </div>



        </div>
    </div>


    <h2 class="content-heading">นำเข้า Serial number</h2>
    <div class="row">
        <div class="col-sm-12">

            <div class="form-group">  
                <div class="table-responsive">  
                     <table class="table table-bordered" id="dynamic_field">  
                          <tr>  
                               <td><input type="text" name="sn[]" class="form-control form-control-sm" /></td>  
                               <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-sm">X</button></td>  
                          </tr>    
                     </table>  
                     <button type="button" name="add" id="add" class="btn btn-success">เพิ่มอีก</button>
                </div>  
            </div> 


        </div>
    </div>
         


        </p>
    </div>
    <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
        {!! Form::submit('บันทึก', ['class'=>'btn btn-primary']); !!}
    </div>
</div>
        {!! Form::close() !!}



<script>  
$(document).ready(function(){  
        var i=1;  
        $('#add').click(function(){  
            i++;  
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="sn[]" class="form-control form-control-sm" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-sm">X</button></td></tr>');  
        });  
        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });   
});  
</script> --}}