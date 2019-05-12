
        function CheckNum(){
            if ((event.keyCode < 48 || event.keyCode > 57) && event.keyCode != 13){
                swal("ข้อมูลไม่ถูกต้อง!", "กรอกเฉพาะตัวเลขเท่านั้น!");
                event.returnValue = false;
                }
            }