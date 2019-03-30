<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbTransferTemp extends Model
{
    protected $table = 'tb_transfer_temp';
    protected $primaryKey = 'ttemp_id';
    protected $fillable = ['req_id','p_id','u_id','m_id','p_barcode'];
}
