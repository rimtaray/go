<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbReceive extends Model
{
    protected $table = 'tb_receive';
    protected $primaryKey = 're_id';
    protected $fillable = ['re_no','re_date','re_status','u_id','m_id','re_num'];
}
