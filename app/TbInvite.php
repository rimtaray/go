<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbInvite extends Model
{
    protected $table = 'tb_invite';
    protected $primaryKey = 'in_id';
    protected $fillable = ['u_id','m_id','in_email','in_status'];

    public $timestamps = false;
}
