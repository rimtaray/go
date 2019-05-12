
        function fncSubmit_edit_importsn()
        {        
            if(document.form1.t_price.value == "")
            {
                    document.form1.t_price.focus();
                    swal("ข้อมูลยังไม่ครบ!", "โปรดระบุราคาขาย");
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