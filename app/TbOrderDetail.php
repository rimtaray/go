<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbOrderDetail extends Model
{
    protected $table = 'tb_order_detail';
    protected $primaryKey = 'od_id';
    protected $fillable = ['od_no','od_name','od_model','od_num','od_price','od_rec_num','o_id','u_id'];

}
