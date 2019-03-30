<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbSaleDown extends Model
{
    protected $table = 'tb_sale_down';
    protected $primaryKey = 'sd_id';
    protected $fillable = ['sd_type','sd_money','sb_id'];
}
