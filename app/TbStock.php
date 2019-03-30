<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbStock extends Model
{
    protected $table = 'tb_stock';
    protected $primaryKey = 'sk_id';
    protected $fillable = ['m_id','p_id','u_id','sk_num'];
}
