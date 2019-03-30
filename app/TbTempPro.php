<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbTempPro extends Model
{
    protected $table = 'tb_temp_pro';
    protected $primaryKey = 'tp_id';
    protected $fillable = ['tp_barcode','tp_num','u_id','m_id'];
}
