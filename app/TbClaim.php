<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbClaim extends Model
{
    protected $table = 'tb_claim';
    protected $primaryKey = 'c_id';
    protected $fillable = ['c_no','p_id','c_cus_name','c_receive','c_return','c_status','c_cost','c_price','c_etc','c_uid_rec','c_uid_ret','c_uid_upd'];
}
