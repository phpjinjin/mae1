<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\GoodsPic;
use App\Models\Goodval;
use App\Models\Users;
use App\Models\Carts;
use App\Models\Address;
use App\Models\Orders;
use App\Models\OrdersDetail;



class OrdersController extends Controller
{
     /**
     * 前台订单页面
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
   	{
   		$id = $request->session()->get('id');

   		$users = Carts::where('uid',$id)->get();
   		$sum = 0;
   		foreach ($users as $k => $v) {
   				// dump($v->cnt);
			foreach ($v->cart_good as $kk => $vv) {
				// dump($vv->gname);
				
				// 	dump($vv->goodsval->pack);
				
				foreach ($vv->goodspic as $kkk => $vvv) {
					// dump($vvv->gpic);
				}
			}
		 $sum += $v->cnt*$vv->price ;
	    }
	    $v->prices = $sum;


	    $addres = Address::where('uid',$id)->get();
	
	    return view('home.orders.index',['users'=>$users,'addres'=>$addres]);

   		}
   		


   		
  /**
     * 
     *前台订单编辑收货地址
     * @return \Illuminate\Http\Response
     */
  public function show($id)
  {

  	$orders = Address::where('addid',$id)->get();
  	foreach ($orders as $k => $v) {
  		$addres = explode('.',$v->region);
  	}
  	$province = $addres[0];
  	$city = $addres[1];
  	$district = $addres[2];
  	


  	return view('home.orders.show',['orders'=>$orders,'province'=>$province,'city'=>$city,'district'=>$district]);
  	

  }
    /**
     * 提交修改收货信息
     *
     * @return \Illuminate\Http\Response
     */
  public function up(Request $request,$id){
  		
     
  		$address =  Address::find($id);
  		
  		$uid = $request->session()->get('id');

  		$address->uid = $uid;
  		$address->aname = $request->input('aname','');
  		$address->addres = $request->input('addres','');
  		$address->phone = $request->input('phone','');
  		$address->code = $request->input('code','');
  		$address->region = $request->input('region','');
  	$addres = $address->save();
  
        //判断是否成功
         if($addres){
            
            return redirect('/home/orders')->with('success','添加成功');
      
        }else{
           
            return back()->with('error','添加失败');
        }

  }
   /**
     * 提交生成订单号
     *
     * @return \Illuminate\Http\Response
     */
  public function create(Request $request){


    $id = $request->except('_token');
   
    $address =  Address::where('addid',$request->addid)->get();
    $rand = rand(1000,9999).time();

    $orders = new Orders;
   
    $orders->oid = $rand;
    $uid = $request->session()->get('id');

      $users = Carts::where('uid',$uid)->get();
      $sum = 0;
      $cnt = 0;
     $gid = [];
      foreach ($users as $k => $v) {
      $gid[] += $v->gid;
       $ordersdetail = new OrdersDetail;
    $ordersdetail->oid = $orders->oid;

        foreach ($v->cart_good as $kk => $vv) {
             $ordersdetail->pic = $vv->goodspic[0]->gpic;
             $ordersdetail->gid = $vv->gid;
        }
        $cnt += $v->cnt;
     $sum += $v->cnt*$vv->price ;
     $ordersdetail->cnt = $v->cnt;
       $ordersdetail->price = $vv->price;
 $res2 = $ordersdetail->save();
      }

    $orders->sum = $sum;

    $orders->cnt = $cnt;
    $orders->uid = $uid;
    foreach ($address as $add_k => $add_v) {
      $orders->uname = $add_v->aname;
           $detailed =   str_replace('.',' ',$add_v->region);
      $orders->addres =$detailed.$add_v->addres;
      $orders->phone = $add_v->phone;

    }
     
    $orders->message = $request->input('text','');



   $res1 =   $orders->save();
   
 
     foreach ($users as $k5 => $v5) {
      $uiid = $v5->cid;
       $dele = Carts::destroy($uiid);

     }
    
    if ($res1 && $res2 && $dele) {
     return redirect('/home/index')->with('success','添加成功');
      
        }else{
           
            return back()->with('error','添加失败');
        }
 



  }

}
