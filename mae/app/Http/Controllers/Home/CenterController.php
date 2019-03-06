<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\Users;


class CenterController extends Controller
{

	public function index(Request $request)
	{
		
	// 	if ($request->session()->exists('uname')) {
		
	// }
		
		return view('home.personal.index');
		

	}


	 /**
     *订单列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request){
	    session(['key' => 'value']);
	    session(['key1' => '1']);

		 $data = $request->session()->get('key1');
		
	   	$order = Orders::where('uid','=',$data)->get();

   		return view('home.personal.order',['order'=>$order]);
    }
    /**
     *取消订单
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
	    $res = Orders::find($id);
     
        $orders = Orders::destroy($id);
        $ordersdetail = OrdersDetail::destroy($res->ordersdetail->oid);  
        if($orders && $ordersdetail){
        	echo '1';
        }else{
        	echo '0';
        }
        
    }


}
