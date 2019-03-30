<?php
namespace App\Helper;

class Helpers
{

    //  ไม่ได้ใช้ไฟล์นี้ ตัวที่ใช้อยู่ที่  app/Http/helpers.php 


    
    public static function formatDateThai($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strHour= date("H",strtotime($strDate));
        $strMinute= date("i",strtotime($strDate));
        $strSeconds= date("s",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear $strHour:$strMinute";
    }

    public static function cat_name($id)
    {
        $data = \App\TbCategory::where('cat_id',$id)->pluck('cat_name')->first();
        if(!$data){ $data = 'เป็นหมวดหมู่หลัก'; }
        
        return $data;
    }

    public static function wallet_name($id)
    {
        $data = \App\TbWalletCat::where('wc_id',$id)->pluck('wc_name')->first();
        if(!$data){ $data = 'เป็นหมวดหมู่หลัก'; }

        return $data;
    }
}