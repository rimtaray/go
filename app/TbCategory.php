<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbCategory extends Model
{
    protected $table = 'tb_category';
    protected $primaryKey = 'cat_id';
    protected $fillable = ['cat_id','m_id_up','cat_name','cat_type','cat_status'];

    public function updateCategory($data)
    {
        $productcat = $this->find($data['cat_id']);
        $productcat->cat_name = $data['t_name'];
        $productcat->cat_type = $data['s_type'];
        $productcat->cat_status = $data['s_status'];
        $productcat->save();
        return 1;
    }
}
