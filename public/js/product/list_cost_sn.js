
        function fncSubmit_edit()
        {       
            if(document.form1.t_name.value == "")
            {
                    document.form1.t_name.focus();
                    swal("ข้อมูลยังไม่ครบ!", "โปรดระบุชื่อสินค้า");
                    return false;
            }
    
            document.form1.submit();
        }

        function fncSubmit_edit_import()
        {        
            if(document.form1.t_name.value == "")
            {
                    document.form1.t_name.focus();
                    swal("ข้อมูลยังไม่ครบ!", "โปรดระบุชื่อสินค้า");
                    return false;
            }
    
            document.form1.submit();
        }

        function fncSubmit_add()
        {        
            if(document.form1.t_num.value == "")
            {
                    document.form1.t_num.focus();
                    swal("ข้อมูลยังไม่ครบ!", "โปรดระบุจำนวนอย่างน้อย 1");
                    return false;
            }
            if(document.form1.t_price.value == "")
            {
                    document.form1.t_price.focus();
                    swal("ข้อมูลยังไม่ครบ!", "โปรดระบุราคาขายต่อหน่วย");
                    return false;
            }
    
            document.form1.submit();
        }

        function fncSubmit_addsn()
        {     
            if(document.form1.t_price.value == "")
            {
                    document.form1.t_price.focus();
                    swal("ข้อมูลยังไม่ครบ!", "โปรดระบุราคาขายต่อหน่วย");
                    return false;
            }
    
            document.form1.submit();
        }

        function fncSubmit_create()
        {     
            if(document.form1.t_name.value == "")
            {
                    document.form1.t_name.focus();
                    swal("ข้อมูลยังไม่ครบ!", "โปรดระบุชื่อสินค้า");
                    return false;
            }
            
            if(document.form1.t_price.value == "")
            {
                    document.form1.t_price.focus();
                    swal("ข้อมูลยังไม่ครบ!", "โปรดระบุราคาขายต่อหน่วย");
                    return false;
            }
    
            document.form1.submit();
        }
        

        function CheckNum(){
        if ((event.keyCode < 48 || event.keyCode > 57) && event.keyCode != 13){
            swal("ข้อมูลไม่ถูกต้อง!", "กรอกเฉพาะตัวเลขเท่านั้น!");
            event.returnValue = false;
            }
        }