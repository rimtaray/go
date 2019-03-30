<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use App\TbSale;
use DB;
use App\TbProduct;
use App\TbCategory;
use App\TbProductSn;

class TbSaleController extends Controller
{

    public function check($ck)
    {
        if($ck == 'sale')
        {
            return $this->go_to_sale();
        }

        if($ck == 'credit')
        {
            return 'credit';
        }

        if($ck == 'cancel_all')
        {
            return $this->del_all();
        }

        if($ck == 'pay')
        {
            return view('sale.pay');
        }

    }

    public function work($work,$id)
    {
        if($work == 'get_sn')
        {         
            return $this->get_sn($id);
        }
        if($work == 'get_sn_id')
        {         
            return $this->get_sn_id($id);
        }

        if($work == 'click')
        {
            return $this->add_sale($id);
        }

        if($work == 'read-data')
        {
            return $this->readData($id);
        }

        if($work == 'read-product')
        {
            return $this->readProduct($id);
        }

        if($work == 'read-barcode')
        {
            return $this->read_barcode($id);
        }

        if($work == 'check-barcode')
        {
            return $this->check_barcode($id);
        }

        // if($work == 'autocomp')
        // {
        //     return $this->search($id);
        // }

        // if($work == 'cancel')
        // {
        //     dd($id);
        //     $sid = $id->sid;
        //     $psid = $id->psid;
        //     return $this->del_one($sid,$psid);
        // }
    }

    public function index()
    {        
        $data = DB::table('tb_product')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_detail.pd_id','=','tb_product_sn.pd_id')
                ->where('m_id','=',session()->get('mid'))
                ->where('ps_num','>','0')
                ->where('p_status','1')
                ->groupBy('tb_product_detail.p_id')
                ->orderBy('cat_id','asc')
                ->orderBy('p_name','asc')
                ->get();

        $scat = TbCategory::where('m_id_up','=',session()->get('midup'))
                ->orderBy('cat_name','asc')
                ->get();

        $sum_p = TbSale::where('u_id', session()->get('uid'))
                ->selectRaw('sum(s_num) as snum')
                ->where('m_id', session()->get('mid'))
                ->where('s_status','0')
                ->first();

        $sale = DB::table('tb_sale')
        ->select('s_id','s_barcode','s_pname','s_pdid','s_psid','s_num','s_price')
        ->where('s_status','0')
        ->where('u_id',session()->get('uid'))
        ->where('m_id',session()->get('mid'))
        ->get();

        $sum = DB::table('tb_sale')
        ->selectRaw('sum(s_price) as sumprice')
        ->where('s_status','0')
        ->where('u_id',session()->get('uid'))
        ->where('m_id',session()->get('mid'))
        ->first();

        return view('sale.product',[
            'data'=>$data,
            'scat'=>$scat,
            'sum_p'=>$sum_p,
            'sale'=>$sale,
            'sum'=>$sum,
            'txt'=>'สินค้าทั้งหมด'
            ]);
    }


    // jquery
    public function readData($id)
    {
        //return $id;
        if($id != '0')
        {
            $data = DB::table('tb_product')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_detail.pd_id','=','tb_product_sn.pd_id')
                ->where('m_id','=',session()->get('mid'))
                ->where('ps_num','>','0')
                ->where('cat_id',$id)
                ->where('p_status','1')
                ->groupBy('tb_product_detail.p_id')
                ->orderBy('p_name','asc')
                ->get();
        }
        else
        {
            $data = DB::table('tb_product')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_detail.pd_id','=','tb_product_sn.pd_id')
                ->where('m_id','=',session()->get('mid'))
                ->where('ps_num','>','0')
                ->where('p_status','1')
                ->groupBy('tb_product_detail.p_id')
                ->orderBy('cat_id','asc')
                ->orderBy('p_name','asc')
                ->get();
        }
        

        return view('sale.pos_product',[
            'data'=>$data
            ]);
    }


    // jquery
    // public function readProduct($id)
    // {
    //     //return $id;
    //     $pro = DB::table('tb_product')
    //             ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
    //             ->join('tb_product_sn','tb_product_detail.pd_id','=','tb_product_sn.pd_id')
    //             ->where('m_id','=',session()->get('mid'))
    //             ->where('ps_sn',$id)
    //             ->groupBy('tb_product_detail.p_id')
    //             ->first();

    //     //$pro = TbProductSn::where('ps_sn',$id)->first();

    //     $txt = '<tr>
    //     <td class="text-left">'. $pro->p_name .'</td>
    //     <td class="text-center" id="'.$pro->ps_sn.'">1</td>
    //     <td class="text-center">'. $pro->p_price .'</td>
    //     <td class="text-center">
    //         <a href="" class="btn-del" pId="'.$pro->ps_sn.'"><i class="fa fa-trash text-danger"></i></a>
    //     </td></tr>';
        
    //     return $txt;
    // }

    // jquery
    public function read_barcode($id)
    {
        //$pro = TbProduct::where('p_id',$id)->first();
        $pro = DB::table('tb_product')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_detail.pd_id','=','tb_product_sn.pd_id')
                ->where('m_id','=',session()->get('mid'))
                ->where('ps_sn',$id)
                ->groupBy('tb_product_detail.p_id')
                ->first();

        $txt = '<tr>
        <input type="hidden" name="h_psn['.$pro->ps_sn.']" id="psn'.$pro->ps_sn.'" value="1">
        <td class="text-left">'. $pro->p_name .'</td>
        <td class="text-center" id="num'.$pro->ps_sn.'">1</td>
        <td class="text-center" id="price'.$pro->ps_sn.'">'. $pro->p_price .'</td>
        <td class="text-center">
            <a  class="btn-del" pId="'.$pro->ps_sn.'" onclick="del_one('.$pro->ps_sn.')"><i class="fa fa-trash text-danger"></i></a>
        </td></tr>';

        
        return $txt;
    }

    public function check_barcode($id)
    {
        //$pro = TbProduct::where('p_id',$id)->first();
        $pro = DB::table('tb_product')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_detail.pd_id','=','tb_product_sn.pd_id')
                ->where('m_id','=',session()->get('mid'))
                ->where('ps_sn',$id)
                ->where('p_status','1')
                ->groupBy('tb_product_detail.p_id')
                ->count();
        
        return $pro;
    }

    public function check_product(Request $req)
    {
        $over = [];
        foreach($req->h_psn as $key => $value){
            $prod = $this->type_stock($key);
                //dd($prod);
            if($prod[0]->p_stock == '1'){
                // เป็นสินค้าที่ต้องตัดสต๊อก
                if($prod[0]->psnum < $value){
                    $over[$prod[0]->p_name] = $prod[0]->psnum;
                }
            }
        }

        return $over;
    }

    public function type_stock($id)
    {
        $data = DB::table('tb_product')
        ->select('p_name','p_stock','ps_num')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
        ->groupBy('tb_product_detail.p_id')
        ->selectRaw('sum(ps_num) as psnum')
        ->where('m_id',session()->get('mid'))
        ->where('ps_sn',$id)
        ->get();

        return $data;
    }

    public function autocomp(Request $request)
    {
        $res = array();
        
        $datas = DB::table('tb_product')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_detail.pd_id','=','tb_product_sn.pd_id')
                ->where('ps_num','>','0')
                ->where('p_status','1')
                ->where("p_name","LIKE","%".$request->term."%")
                ->where("m_id",session()->get('mid'))
                ->groupBy('tb_product_detail.p_id')
                ->get();
        
        foreach($datas as $data){
            $res[] = ['id'=>$data->ps_sn, 'value'=>$data->p_name, 'ck'=>$data->p_sn, 'pid'=>$data->p_id ];
        }
        
        return response()->json($res);

        //return response()->json($data);
	}

    public function pos(Request $request)
    {
        if(!$request->s_cat)
        return redirect('/sale');
        
        $data = DB::table('tb_product')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_detail.pd_id','=','tb_product_sn.pd_id')
                ->where('cat_id',$request->s_cat)
                ->where('m_id','=',session()->get('mid'))
                ->where('ps_num','>','0')
                ->where('p_status','1')
                ->groupBy('tb_product_detail.p_id')
                ->orderBy('cat_id','asc')
                ->orderBy('p_name','asc')
                ->get();

        $scat = TbCategory::where('m_id_up','=',session()->get('midup'))
                ->orderBy('cat_name','asc')
                ->get();

        $sum_p = TbSale::where('u_id', session()->get('uid'))
                ->selectRaw('sum(s_num) as snum')
                ->where('m_id', session()->get('mid'))
                ->where('s_status','0')
                ->first();

        $txt = TbCategory::where('cat_id',$request->s_cat)->first();

        return view('sale.product',[
            'data'=>$data,
            'scat'=>$scat,
            'sum_p'=>$sum_p,
            'txt'=>$txt->cat_name
            ]);
    }

    private function get_sn($id)
    {
        $product = TbProduct::where('p_name',$id)->first();

        $data = DB::table('tb_product')
                ->select('tb_product.p_id','p_name','p_image','ps_sn','ps_id')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_detail.pd_id','=','tb_product_sn.pd_id')
                ->where('p_name',$id)
                ->where('ps_num','>','0')
                ->get();

        return view('sale.select_sn',[
            'data'=>$data,
            'product'=>$product
            ]);
    }

    private function get_sn_id($id)
    {
        $product = TbProduct::where('p_id',$id)->first();

        $data = DB::table('tb_product')
                ->select('tb_product.p_id','p_name','p_image','ps_sn','ps_id')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_detail.pd_id','=','tb_product_sn.pd_id')
                ->where('tb_product.p_id',$id)
                ->where('ps_num','>','0')
                ->get();

        return view('sale.select_sn',[
            'data'=>$data,
            'product'=>$product
            ]);
    }

    public function store(Request $request)
    {       
        // if($request->ck == 'upd_price')
        // {
        //     return $this->upd_price($request);
        // }
           
        // if($request->ck == 'add_sale')
        // {
        //     return $this->add_sale($request->t_sn);
        // }
           
        // if($request->ck == 'pay')
        // {
        //     return $this->pay($request);
        // }
    }

    // private function upd_price($req)
    // {
    //     DB::table('tb_sale')
    //         ->where('s_id',$req->h_sid)
    //         ->update(['s_price'=>$req->t_newprice]);

    //         return redirect('/sale/sale');
    // }

    // private function chk_basket($id)
    // {
    //     $count = TbSale::where('s_barcode',$id)
    //             ->where('u_id',session()->get('uid'))
    //             ->where('m_id',session()->get('mid'))
    //             ->where('s_status','0')
    //             ->count();
        
    //     if($count){
    //         $data = TbSale::where('s_barcode',$id)
    //             ->where('u_id',session()->get('uid'))
    //             ->where('m_id',session()->get('mid'))
    //             ->where('s_status','0')
    //             ->first();

    //         return $data;
    //     }else{
    //         return 0;
    //     }
    // }

    // private function upd_basket($id,$num)
    // {
    //     $upd = new TbSale();        
    //     $upd->updatebasket($id,$num);

    //     return 1;
    // }

    // private function add_sale($id)
    // {            
    //     $product = DB::table('tb_product')
    //             ->select('p_name','tb_product_detail.pd_id','ps_id','pd_cost','pd_price','pd_price','ps_id','ps_num', 'p_stock', 'p_sn')
    //             ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
    //             ->join('tb_product_sn','tb_product_detail.pd_id','=','tb_product_sn.pd_id')
    //             ->where('ps_sn',$id)
    //             ->where('pd_status','1')
    //             ->where('ps_num','>','0')
    //             ->where('m_id',session()->get('mid'))
    //             ->orderBy('tb_product_detail.created_at','asc')
    //             ->first();
        
    //     if($product)
    //     {
    //         if($product->p_stock == '1')  // เช็คตัดสต๊อก
    //         {
    //             $this->cut_number($product);
    //         }

    //         $chk_basket = $this->chk_basket($id); // เช็คจำนวนในตะกร้า
    //         if($chk_basket == '0')
    //         {
    //             $this->ins_basket($product,$id);  
    //             //SWAL::message('ผลการทำงาน','insert','success',['timer'=>3000]);                  
    //         }
    //         else
    //         {
    //             $this->upd_basket($chk_basket->s_id,$chk_basket->s_num+1);    
    //             //SWAL::message('ผลการทำงาน','update','success',['timer'=>3000]);  
    //         }
            
    //         SWAL::message('ผลการทำงาน','เพิ่มสินค้าลงตะกร้าแล้ว','success',['timer'=>3000]); 
    //     }
    //     else
    //     {
    //         SWAL::message('ผลการทำงาน','ไม่พบสินค้ารหัส '.$id,'warning',['timer'=>3000]);
    //     }
    //     return redirect('sale');
    // }

    // private function cut_number($pro)
    // {
    //     $num = $pro->ps_num - 1;
    //     $this->upd_product_num($pro->ps_id,$num);

    //     return 1;
    // }    

    // private function ins_basket($product,$id)
    // {
    //     $ins = new TbSale();
    //     $ins->s_barcode = $id;
    //     $ins->s_pname = $product->p_name;
    //     $ins->s_pdid = $product->pd_id;
    //     $ins->s_psid = $product->ps_id;
    //     $ins->s_pcost = $product->pd_cost;
    //     $ins->s_pprice = $product->pd_price;
    //     $ins->u_id = session()->get('uid');
    //     $ins->m_id = session()->get('mid');
    //     $ins->s_num = '1';
    //     $ins->s_status = '0';
    //     $ins->s_price = $product->pd_price;
    //     $ins->save();

    //     return 1;
    // }

    // public function del_one($sid,$psid)
    // {
    //     $this->sale_del($sid,$psid);
    //     return redirect('/sale/sale');
    // }

    // private function del_all()
    // {
    //     $sale = TbSale::select('s_id','s_psid')
    //             ->where('u_id',session()->get('uid'))
    //             ->where('m_id',session()->get('mid'))
    //             ->where('s_status','0')
    //             ->get();

    //     foreach($sale as $sale)
    //     {
    //         $this->sale_del($sale->s_id, $sale->s_psid);
    //     }

    //     return redirect('/sale/sale');
    // }

    // private function sale_del($sid,$psid)
    // {

    //     $product = DB::table('tb_product')
    //             ->select('ps_num', 'p_stock')
    //             ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
    //             ->join('tb_product_sn','tb_product_detail.pd_id','=','tb_product_sn.pd_id')
    //             ->where('ps_id',$psid)
    //             ->where('m_id',session()->get('mid'))
    //             ->first();

    //     $sale = TbSale::find($sid);

    //     if($product->p_stock == '1')
    //     {
    //         $num = $product->ps_num + $sale->s_num;
    //         $this->upd_product_num($psid,$num);
    //     }

    //     $sale->delete();

    //     return 1;
    // }

    // -------- function ใช้ร่วมกัน -------

    private function go_to_sale()
    {
        $sale = DB::table('tb_sale')
        ->select('s_id','s_barcode','s_pname','s_pdid','s_psid','s_num','s_price')
        ->where('s_status','0')
        ->where('u_id',session()->get('uid'))
        ->where('m_id',session()->get('mid'))
        ->get();

        $sum = DB::table('tb_sale')
        ->selectRaw('sum(s_price) as sumprice')
        ->where('s_status','0')
        ->where('u_id',session()->get('uid'))
        ->where('m_id',session()->get('mid'))
        ->first();

        return view('sale.sale',[
            'sale'=>$sale,
            'sum'=>$sum
            ]);
    }

    // private function upd_product_num($psid,$num)
    // {
    //     DB::table('tb_product_sn')
    //         ->where('ps_id',$psid)
    //         ->update(['ps_num'=>$num]);

    //     return 1;
    // }


}
