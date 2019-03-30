<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbInvoice extends Model
{
    protected $table = 'tb_invoice';
    protected $primaryKey = 'i_id';
    protected $fillable = ['m_id','u_id','sb_no','i_date','i_refer','i_no','i_name','i_add','i_tel','i_office','i_idcard','i_type','i_status'];
}
