<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\GoodsPic;
use App\Models\Goodval;
use App\Models\Users;
use App\Models\Carts;

class OrdersController extends Controller
{
    //
   public function index(Request $request)
   	{
   		$id = $request->session()->get('id');

   		$users = Carts::where('uid',$id)->get();
   		
   		


   		return view('home.orders.index',['users'=>$users]);


   	}
}
