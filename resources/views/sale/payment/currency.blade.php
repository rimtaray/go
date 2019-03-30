

<!-- Your Block -->
<div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
            <h3 class="block-title">เลือกสกุลเงิน</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
            </div>
        </div>
        <div class="block-content">

                <!-- Basic Elements -->
                <div class="row push">
                    <div class="col-lg-12 col-xl-12">

            
                        
                            <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 10%;">#</th>
                                            <th class="text-center" style="width: 80%;">ชื่อสกุลเงิน</th>
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
                                            <td class="text-left">{{ $data->cu_name }}</td>
                                            <td class="text-center">
                                                <a href="#modalAdd" data-toggle="modal" data-href="{{ url('payment/create_currency/'.$data->cu_id) }}" ><button type="button" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-plus"></i> เลือก
                                                </button></a>
                                            </td>
                                        </tr>
                                        @endforeach 
                        
                                    </tbody>
                                </table>
            

                    </div>
                </div>
                
                
                <!-- END Basic Elements -->

        </div>
        <div class="block-content block-content-full text-right bg-light">
            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
        </div>



    </div>
    <!-- END Your Block -->
        
        