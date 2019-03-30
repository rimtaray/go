<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbTemp extends Model
{
    protected $table = 'tb_temp';
    protected $primaryKey = 't_id';
    protected $fillable = ['m_id','p_id','t_num'];
}
