
                    <!-- Your Block -->
                    <div class="block block-rounded block-bordered block-pay">
                            <div class="block-content">

                                    <!-- Basic Elements -->
                                    <h2 class="content-heading pt-0">ชำระเงิน {!! date("d/m/Y H:i") !!}</h2>
                                    <div class="row push">
                                        <div class="col-lg-12 col-xl-12">

                                     <form method="POST" action="{{ url('salebill') }}" id="frm-pay">
                                    {{ csrf_field() }}  
                                    <input type="hidden" name="ck" value="pay">
                                    
                                            
                                            <div class="form-group total-pay-show">
                                                <label for="t_name">รวม</label>
                                                <h3></h3>
                                                <input type="hidden" class="form-control " value="" readonly id="pricetotal" name="pricetotal" >
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
                                                <div class="col-12">
                                                    <button type="button" class="px-3 btn btn-square btn-hero-success" onclick="">20</button>
                                                    <button type="button" class="px-3 btn btn-square btn-hero-info" onclick="">50</button>
                                                    <button type="button" class="px-3 btn btn-square btn-hero-danger" onclick="">100</button>
                                                    <button type="button" class="px-3 btn btn-square btn-hero-primary" onclick="">500</button>
                                                    <button type="button" class="px-3 btn btn-square btn-hero-secondary" onclick="">1000</button>
                                                    <button type="button" class="px-3 btn btn-square btn-hero-success" onclick="">พอดี</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <!-- END Basic Elements -->
                
                            </div>
                            <div class="block-content block-content-full text-right bg-light">
                                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                {!! Form::submit('ชำระเงิน', ['class'=>'btn btn-primary']); !!}
                            </div>
                
                            {!! Form::close() !!}


                        </div>
                        <!-- END Your Block -->