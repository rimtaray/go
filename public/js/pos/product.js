
    $(document).ready(function(){
        let path = "{{ url('sale/read-data/0') }}";
        console.log(path);
        $.get(path, function(data){
            console.log(data);
            $('#block-product').empty().html(data)                
        })

    })

    // $('.category').on('click', '.btn_cat', function(){
    //     let catid = $('.btn_cat').val();
    //     console.log(catid);
    //     // $.get(catid, function(data){
    //     //     $('#block-product').empty().html(data)                
    //     // })
    // })

    function click_pay()
    {
        let path = '{{ URL("salebill_product") }}';
        $.get(path, $('#frm-basket').serialize(), function(data){
            
            var count = Object.keys(data).length;
            //console.log(count);
            if(count){
                $.each( data, function( key, value){
                    Dashmix.helpers('notify', {type: 'warning', icon: 'fa fa-exclamation mr-1', message: key + ' มีจำนวนคงเหลือ ' + value});
                });
            }else{
                jQuery('#modalPay').modal('show');
                let total_pay = $('#sum_cash').html();
                //console.log(total_pay);
                $('#total-pay').html('รวม : ' + total_pay);
                $('#pricetotal').val(total_pay);
            }
        });

    }

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

    function torn()
    {
        let a = $("#pricetotal").val();
        let b = $("#discount").val();
        let c = $("#getmoney").val();
        let d = parseFloat(c) - parseFloat(a) + parseFloat(b);

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
        $('#getmoney').val(money);
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
