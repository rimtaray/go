<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbTransferPro extends Model
{
    protected $table = 'tb_transfer_pro';
    protected $primaryKey = 'tpro_id';
    protected $fillable = ['req_id','p_id','tpro_app'];
}
