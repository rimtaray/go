<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbBarcode extends Model
{
    protected $table = 'tb_barcode';
    protected $primaryKey = 'ba_id';
    protected $fillable = ['ba_name','ba_etc','p_id'];

    public function updateBarcode($data)
    {
        $gohala = $this->find($data['ba_id']);
        $gohala->ba_name = $data['t_name'];
        $gohala->ba_etc = $data['t_etc'];
        $gohala->p_id = $data['t_pid'];
        $gohala->save();
        return 1;
    }
}
