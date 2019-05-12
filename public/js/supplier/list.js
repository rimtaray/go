
        function fncSubmit_create()
        {
            if(document.form1.t_name.value == "")
            {
                    document.form1.t_name.focus();
                    swal("ข้อมูลยังไม่ครบ!", "โปรดระบุชื่อผู้ขาย");
                    return false;
            }
    
            document.form1.submit();
        }