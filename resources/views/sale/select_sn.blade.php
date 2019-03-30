




<div class="block block-themed block-transparent mb-0">
<div class="block-header bg-primary-dark">
    <h3 class="block-title">ชื่อสินค้า : {{ $product->p_name }}</h3>
    <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-fw fa-times"></i>
        </button>
    </div>
</div>
<div class="block-content">
    <p>
        
    <div class="text-center"><img src="{{ asset('images_product/resize/'.$product->p_image) }}"></div>


    <h2 class="content-heading">เลือก Serial number</h2>
    <div class="row">
        <div class="col-sm-12">

            
                <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">#</th>
                                <th class="text-center" style="width: 80%;">รหัสสินค้า</th>
                                <th class="text-center" style="width: 10%;">เลือก</th>
                            </tr>
                        </thead>
                        <tbody>
        
                            <?
                            $i = '1'; 
                            ?>
            
                            @foreach($data as $data)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-left">
                                    <a id="pid{{ $data->ps_sn }}" get_product="{{ URL::to('sale/read-barcode/'.$data->ps_sn) }}" onclick="click_product_sn({{ $data->ps_sn }})" style="color:dimgray" data-dismiss="modal" aria-label="Close">
                                        {{ $data->ps_sn }}
                                    </a>
                                </td>

                                <td class="text-center">
                                    <a id="pid{{ $data->ps_sn }}" get_product="{{ URL::to('sale/read-barcode/'.$data->ps_sn) }}" onclick="click_product_sn({{ $data->ps_sn }})" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-check fa-2x text-success"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
            
                        </tbody>
                    </table>


        </div>
    </div>
         


        </p>
    </div>
    
</div>


