<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use App\TbCategory;
use App\User;
use Auth;
use App\TbMember;

class TbCategoryController extends Controller
{
    
    public function index()
    {
        $cat = TbCategory::where('m_id_up','=',session()->get('midup'))
                    ->orderBy('cat_name','asc')
                    ->get();

        return view('category.product',[
            'cat'=>$cat
            ]);
    }

    // jquery
    // public function readData()
    // {
    //     $cat = TbCategory::where('m_id_up','=',session()->get('midup'))
    //                 ->orderBy('cat_name','asc')
    //                 ->get();

    //     return view('category.cat_list',[
    //         'cat'=>$cat
    //         ]);
    // }


    public function create()
    {
        $scat = TbCategory::where('m_id_up','=',session()->get('midup'))
                    ->orderBy('cat_name','asc')
                    ->pluck('cat_name','cat_id');

        return view('category.create',[
            'scat'=>$scat
            ]);
    }

    public function store(Request $request)
    {
        $type = $request->s_type;        
        if($type==''){ $type = '0'; }
        
        $data = new TbCategory();
        $data->m_id_up = session()->get('midup');
        $data->cat_name = $request->t_name;
        $data->cat_type = $type;
        $data->cat_status = '1';

        $data->save();
        SWAL::message('ผลการทำงาน','บันทึกข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);
        
        return redirect('cat_product');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = TbCategory::findOrFail($id);
        $scat = TbCategory::where('m_id_up',session()->get('midup'))
                    ->orderBy('cat_name','asc')
                    ->pluck('cat_name','cat_id');

        $scat->prepend('ตั้งเป็นหมวดหมู่หลัก');

        return view('category.product_edit',[
            'productcat'=>$data,
            'scat'=>$scat
            ]);
    }

    public function update(Request $request, $id)
    {
        $cat = new TbCategory();
        $data = $this->validate($request, [
            't_name'=>'required',
            's_type'=>'required',
            's_status'=>'required'
        ]);
        $data['cat_id'] = $id;

        $cat->updateCategory($data);

        SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
        return redirect('cat_product');
    }


}