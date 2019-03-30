<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbRequest extends Model
{
    protected $table = 'tb_request';
    protected $primaryKey = 'req_id';
    protected $fillable = ['req_mid_send','req_mid_receive','req_date_send','req_uid_req','req_uid_apr','req_date_app','p_id','req_num_send','req_num_app','req_status'];
}
