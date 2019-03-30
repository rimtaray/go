<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbBillNo extends Model
{
    protected $table = 'tb_bill_no';
    protected $primaryKey = 'bno_id';
    protected $fillable = ['bno_id','bno_no','bno_mid'];

}
