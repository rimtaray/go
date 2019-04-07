

<!-- Your Block -->
<div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
            <h3 class="block-title">เลือกบัญชีธนาคาร</h3>
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
                                            <th class="text-center" style="width: 15%;">ชื่อธนาคาร</th>
                                            <th class="text-center" style="width: 15%;">ชื่อสาขา</th>
                                            <th class="text-center" style="width: 20%;">เลขที่บัญชี</th>
                                            <th class="text-center" style="width: 20%;">ชื่อบัญชี</th>
                                            <th class="text-center" style="width: 20%;">จำนวนเงิน</th>
                                            <th class="text-center" style="width: 10%;">เพิ่ม</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($data as $data)
                                        <tr>
                                            <td class="text-left">{{ $data->b_bank }}</td>
                                            <td class="text-left">{{ $data->b_office }}</td>
                                            <td class="text-left">
                                                {{ $data->b_no }}
                                                <input type="hidden" id="t_bank_no" value="{{ $data->b_no }}">
                                                <input type="hidden" id="t_bank_id" value="{{ $data->b_id }}">
                                            </td>
                                            <td class="text-left">{{ $data->b_name }}</td>
                                            <td><input type="text" class="form-control" name="t_bank_amount" id="t_bank_amount" value=""></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-primary" onclick="bank_add()" data-dismiss="modal">
                                                    <i class="fa fa-plus"></i> เลือก
                                                </button>
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
        
        