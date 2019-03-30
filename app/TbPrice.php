<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbPrice extends Model
{
    protected $table = 'tb_price';
    protected $primaryKey = 'pd_id';
    protected $fillable = ['pd_id','lp_id','pr_price'];

    public function updatePrice($data)
    {
        $gohala = $this->find($data['pd_id']);
        $gohala->lp_id = $data['t_lpid'];
        $gohala->pr_price = $data['p_price'];
        $gohala->save();
        return 1;
    }

    public function price()
    {
        return $this->belongsTo(TbLevelPrice::class, 'lp_id');
    }
}
