<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\Users;
use App\Models\Goods;


class CenterController extends Controller
{

	public function index(Request $request)
	{
		
	  
	   
		return view('home.personal.index');
		

	}


	 /**
     *订单列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request){
	     $id = $request->session()->get('id');

		
		
	   	$order = Orders::where('uid',$id)->get();

   		return view('home.personal.order',['order'=>$order]);
    }
    /**
     *取消订单
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
	    $res = Orders::find($id);
        $res1 = OrdersDetail::where('oid',$id)->get();
        $orders = Orders::destroy($id);
      foreach ($res1 as $k =>$v) {
               $ordersdetail = OrdersDetail::destroy($v->odid);  
      }
        
        
       
        
        if($orders && $ordersdetail){
        	echo '1';
        }else{
        	echo '0';
        }
        
    }
     /**
     *订单详情
     *
     * @return \Illuminate\Http\Response
     */
     public function show(Request $request,$id)
     {
        $uid =   $request->session()->get('id');
           $orders = Orders::where('uid',$uid)->get();
       foreach ($orders as $k => $v) {
       
            $goods = Goods::where('gid',$v->ordersdetail->gid)->get();
            
       }
       foreach ($goods as $kk => $vv) {
              dump($vv->goodspic[0]);
       }

        return view('home.personal.show',['orders'=>$orders,'goods'=>$goods]);

     }


}
