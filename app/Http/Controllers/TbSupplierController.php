<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use Auth;
use App\TbMember;
use App\TbSupplier;

class TbSupplierController extends Controller
{
    
    public function index()
    {
        $mid = session()->get('mid');
        $midup = session()->get('midup');
        //$midup = TbMember::where('m_id',$mid)->pluck('m_id_up')->first();

        $data = TbSupplier::where('m_id_up',$midup)->get();

        return view('supplier.list',[
            'data'=>$data
            ]);
    }

    public function create()
    {
        return view('supplier.create'); 
    }

    public function store(Request $request)
    {        
        $mid = session()->get('mid');
        $midup = session()->get('midup');
        //$midup = TbMember::where('m_id',$mid)->pluck('m_id_up')->first();

        $data = new TbSupplier();
        $data->sup_name = $request->t_name;
        $data->sup_address = $request->t_add;
        $data->sup_tel = $request->t_tel;
        $data->sup_status = '1';
        $data->m_id_up = $midup;
        $data->save();

        SWAL::message('ผลการทำงาน','บันทึกเรียบร้อยแล้ว','success',['timer'=>5000]);

        return redirect('/supplier');
    }

    public function edit($id)
    {     
        $data = TbSupplier::findOrFail($id);

        return view('supplier.form',[
            'data'=>$data
            ]);
    }

    public function update(Request $request, $id)
    {
        $upd = new TbSupplier();
        $data = $this->validate($request, [
            't_name'=>'required',
            't_add'=>'required',
            't_tel'=>'required',
            's_status'=>'required'
        ]);
        $data['sup_id'] = $id;
        
        $upd->updateSup($data);

        SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
        return redirect('supplier');
    }
}
