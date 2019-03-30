<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use Auth;
use App\TbProduct;
use DB;
use App\TbProductSn;
use App\TbCategory;
use App\TbSupplier;
use App\TbProductDetail;
use Image;

class TbProductSnController extends Controller
{
    
    public function index()
    {

        $data = DB::table('tb_product')
        ->select('tb_product.p_id','p_barcode','p_name','p_image',
                'cat_id','pd_id','p_price')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->groupBy('tb_product_detail.p_id')
        ->where('m_id',session()->get('mid'))
        ->where('p_sn','1')
        ->get();

        return view('product.list_cost_sn',[
            'data'=>$data
            ]);
    }

    public function create()
    {
        $scat = TbCategory::where('m_id_up','=',session()->get('midup'))
                    ->orderBy('cat_name','asc')
                    ->select('cat_name','cat_id')
                    ->get();
        
        $ssup = TbSupplier::where('m_id_up','=',session()->get('midup'))
                    ->orderBy('sup_name','asc')
                    ->pluck('sup_name','sup_id');

        return view('product.create_sn',[
            'scat'=>$scat,
            'ssup'=>$ssup
            ]);
    }

    // public function editsn($id)
    // {  
    //     $midup = session()->get('midup'); 

    //     $data = TbProduct::findOrFail($id);

    //     $scat = \App\TbCategory::where('m_id_up','=',$midup)
    //                 ->orderBy('cat_name','asc')
    //                 ->get();

    //     return view('product.editsncost',[
    //         'data'=>$data,
    //         'scat'=>$scat
    //         ]);
    // }

    public function edit($id)
    {  
        $ssup = TbSupplier::where('m_id_up','=',session()->get('midup'))
                    ->orderBy('sup_name','asc')
                    ->pluck('sup_name','sup_id');

        $sproduct = TbProduct::findOrFail($id);

        $scat = TbCategory::where('m_id_up','=',session()->get('midup'))
                    ->orderBy('cat_name','asc')
                    ->get();


        return view('product.edit_sn',[
            'sproduct'=>$sproduct,
            'ssup'=>$ssup,
            'scat'=>$scat
            ]);
    }

    public function edit_import($pdid)
    {
        $import = DB::table('tb_product_detail')
        ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
        ->where('tb_product_detail.pd_id',$pdid)
        ->first();

        return view('product.edit_import_sn',[
            'import'=>$import
            ]);
    }

    public function update(Request $request, $id)
    {

        if($request->ck == 'edit_import')
        {
                return $this->update_import($request, $id);
        }

        if($request->ck == 'edit_sn')
        {
                return $this->update_sn($request, $id);
        }

    }

    public function update_sn($request, $id)
    {

        $upd = new TbProduct();
        // $data = $this->validate($request, [
        //     't_name'=>'required',
        //     't_add'=>'required',
        //     't_tel'=>'required',
        //     's_status'=>'required'
        // ]);
        // $data['sup_id'] = $id;
        
        $upd->updateProductsn($request, $id);

        SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
        return redirect('/productsn/sn');
    }

    public function update_import($request, $id)
    {
        $upd = new TbProductDetail();        
        $upd->updateProductdetail($request, $id);

        SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
        return redirect('/productsn/import/'.$request->h_pid);
    }


    public function store(Request $request)
    {          
        if($request->ck == 'new')
        {
            return $this->store_new($request);
        }

        if($request->ck == 'add_sn')
        {
            return $this->store_sn($request);
        }

        if($request->ck == 'add_snplus')
        {
            return $this->store_snplus($request);
        }

    }

    private function store_new($request)
    {
        $data = new TbProduct();

        $data->m_id = session()->get('mid');
        $data->p_name = $request->t_name;
        $data->cat_id = $request->s_cat;
        $data->p_low = $request->t_low;
        $data->p_stock = $request->s_stock;
        $data->p_price = $request->t_price;
        $data->p_unit = $request->t_unit;
        $data->p_detail = $request->t_detail;
        $data->p_status = '1';
        $data->p_sn = '1';
        $data->p_receive = '0';
        if($request->hasFile('image')){
            $filename = str_random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/images_product/' , $filename);
            Image::make(public_path() . '/images_product/' . $filename)->resize(50,50)->save(public_path() . '/images_product/resize/' . $filename);
            $data->p_image = $filename;
        }else{
            $data->p_image = 'nopic.jpg';
        }        

        $data->save();


        // ส่วนของรอบนำเข้า

        $data2 = new TbProductDetail();
        $data2->p_id = $data->p_id;
        $data2->pd_cost = $request->t_cost;
        $data2->pd_expired = $request->t_date;
        $data2->pd_alert = $request->t_alert;
        $data2->pd_guarantee = $request->t_claim;
        $data2->pd_status = '1';
        $data2->sup_id = $request->s_sup;
        $data2->u_id = session()->get('uid');
        $data2->save();

        // ส่วน s/n

        $ins_sn = [];
        foreach($request->sn as $sn)
        {
            $ins_sn[] = [
                'pd_id' => $data2->pd_id,
                'ps_sn' => $sn,
                'ps_num' => '1',
                'u_id' => session()->get('uid'),
                'ps_status' => '1',
            ];
        }        
        DB::table('tb_product_sn')->insert($ins_sn);

        SWAL::message('ผลการทำงาน','บันทึกสินค้าใหม่แล้ว','success',['timer'=>5000]);
        return redirect('/productsn');

    }

    private function store_sn($request)
    {        
        // ส่วนของรอบนำเข้า

        $data2 = new TbProductDetail();
        $data2->p_id = $request->h_pid;
        $data2->pd_cost = $request->t_cost;
        $data2->pd_expired = $request->t_date;
        $data2->pd_alert = $request->t_alert;
        $data2->pd_guarantee = $request->t_claim;
        $data2->pd_status = '1';
        $data2->sup_id = $request->s_sup;
        $data2->u_id = session()->get('uid');
        $data2->save();

        // ส่วน s/n

        $ins_sn = [];
        foreach($request->sn as $sn)
        {
            $ins_sn[] = [
                'pd_id' => $data2->pd_id,
                'ps_sn' => $sn,
                'ps_num' => '1',
                'u_id' => session()->get('uid'),
                'ps_status' => '1',
            ];
        }
        
        DB::table('tb_product_sn')->insert($ins_sn);

        SWAL::message('ผลการทำงาน','บันทึกสินค้าใหม่แล้ว','success',['timer'=>5000]);
        return redirect('/productsn/import/'.$request->h_pid);

    }

    private function store_snplus($request)
    {     
        // ส่วน s/n

        $ins_sn = [];
        foreach($request->sn as $sn)
        {
            $ins_sn[] = [
                'pd_id' => $request->h_pdid,
                'ps_sn' => $sn,
                'ps_num' => '1',
                'u_id' => session()->get('uid'),
                'ps_status' => '1',
            ];
        }
        
        DB::table('tb_product_sn')->insert($ins_sn);

        SWAL::message('ผลการทำงาน','บันทึกสินค้าใหม่แล้ว','success',['timer'=>5000]);
        return redirect('/productsn/import/'.$request->h_pid);

    }

    public function import($pid)
    {
        $sproduct = TbProduct::findOrFail($pid);
        // $import = TbProductDetail::where('p_id',$pid)->get();

        $import = DB::table('tb_product')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->join('tb_users','tb_users.u_id','=','tb_product_detail.u_id')
        ->where('m_id',session()->get('mid'))
        ->where('tb_product.p_id',$pid)
        ->where('p_sn','1')
        ->orderBy('tb_product_detail.created_at','desc')
        ->get();

        return view('product.import_sn',[
            'sproduct'=>$sproduct,
            'import'=>$import
            ]);
    }


    public function add_sn($id)
    {
        $ssup = TbSupplier::where('m_id_up','=',session()->get('midup'))
                    ->orderBy('sup_name','asc')
                    ->pluck('sup_name','sup_id');

        $data = TbProduct::findOrFail($id);

        return view('product.add_sn',[
            'ssup'=>$ssup,
            'data'=>$data
            ]);
    }


    public function add_snplus($id)
    {
        $data = DB::table('tb_product')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->where('tb_product_detail.pd_id',$id)
        ->first();
        return view('product.add_snplus',[
            'data'=>$data
            ]);
    }

    // public function store(Request $request)
    // {        
    //     $data = new TbProductSn();
    //     $data->p_id = $request->h_pid;
    //     $data->pb_barcode = $request->t_barcode;
    //     $data->pb_status = '1';
    //     $data->save();

    //     //SWAL::message('ผลการทำงาน','บันทึกเรียบร้อยแล้ว','success',['timer'=>5000]);

    //     return view('product.sn_barcode',[
    //         'pid'=>$data->p_id,
    //         'pname'=>TbProduct::where('p_id',$data->p_id)->pluck('p_name')->first(),
    //         'data'=>TbProductSn::where('p_id',$data->p_id)->get(),
    //         'bar'=>''
    //         ]);
    // }

    // public function edit($id)
    // {
    //     $mid = session()->get('mid');        
    //     $data = TbSupplier::findOrFail($id);

    //     return view('supplier.edit',[
    //         'data'=>$data
    //         ]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $upd = new TbSupplier();
    //     $data = $this->validate($request, [
    //         't_name'=>'required',
    //         't_add'=>'required',
    //         't_tel'=>'required',
    //         's_status'=>'required'
    //     ]);
    //     $data['sup_id'] = $id;
        
    //     $upd->updateSup($data);

    //     SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
    //     return redirect()->action('TbSupplierController@index');
    // }
}
