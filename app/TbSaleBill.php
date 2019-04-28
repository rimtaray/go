<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbSaleBill extends Model
{
    protected $table = 'tb_sale_bill';
    protected $primaryKey = 'sb_id';
    protected $fillable = ['sb_no','sb_discount','sb_money','sb_sum_pay','sb_change','u_id','m_id','sb_status','sb_m_status'];
}
