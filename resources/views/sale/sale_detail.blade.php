


<div class="block block-themed block-transparent mb-0">
<div class="block-header bg-primary-dark">
    <h3 class="block-title">รายการขายเลขที่ : {{ $bill->sb_no }}</h3>
    <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-fw fa-times"></i>
        </button>
    </div>
</div>
<div class="block-content">
    <p>
        
       

    <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%;">#</th>
                    <th class="text-center" style="width: 35%;">ชื่อสินค้า</th>
                    <th class="text-center" style="width: 15%;">ราคา</th>
                    <th class="text-center" style="width: 15%;">จำนวน</th>
                    <th class="text-center" style="width: 15%;">ส่วนลด</th>
                    <th class="text-center" style="width: 15%;">รวม</th>
                </tr>
            </thead>
            <tbody>

                <? $i = '1'; ?>

                @foreach($data as $data)

                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td class="text-left">{{ $data->s_pname }} ({{ $data->s_barcode }})</td>
                    <td class="text-right">{{ $data->s_pprice }}</td>
                    <td class="text-right">{{ $data->s_num }}</td>
                    <td class="text-right">{{ $data->s_pprice - $data->s_price }}</td>
                    <td class="text-right">{{ $data->s_price * $data->s_num }}</td>
                </tr>
                
                @endforeach
                
            </tbody>
        </table>
         


    </p>
    </div>
    <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
    </div>
</div>