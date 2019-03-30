<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbUserRight extends Model
{
    protected $table = 'tb_user_right';
    protected $primaryKey = 'ri_no';
    protected $fillable = ['ri_no','ri_id','ri_name','ri_type','ri_chk'];
}
