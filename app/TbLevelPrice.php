<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbLevelPrice extends Model
{
    protected $table = 'tb_level_price';
    protected $primaryKey = 'lp_id';
    protected $fillable = ['m_id','lp_name','lp_status'];

    public function levelprice()
    {
        return $this->hasMany(TbLevelPrice::class);
    }
}
