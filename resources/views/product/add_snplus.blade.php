



{!! Form::open(array('url'=>'productsn')) !!}

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

        <input name="ck" type="hidden" value="add_snplus">
        {{ Form::hidden('h_pid', $data->p_id) }}
        {{ Form::hidden('h_pdid', $data->pd_id) }}
        
    <div class="text-center"><img src="{{ asset('images_product/resize/'.$data->p_image) }}"></div>


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
</script>