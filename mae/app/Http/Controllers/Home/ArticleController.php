<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Works;
use App\Models\Goods;
use App\Models\GoodsPic;
use App\Models\Goodval;

class ArticleController extends Controller
{
	
    //文章页面
   public function index()
   {

   	
   	$works = Works::where('wstatus','=',1)->get();
   		
   			foreach ($works as $k=>$v){
   				$v->price = Goods::where('gid',$v->gid)->first()->price;
   			}
				return view('home.article.index',['works'=>$works]);
   		
		
   
   	
   		
   		
   }
      //商品详情
   public function show($id)
   {
   	$goods = Goods::where('gid',$id)->first();
        $pic = $goods->goodspic;
        $val = $goods->goodsval;
        $pics = count($pic);
   	
   		return view('home.goods.show',['goods'=>$goods,'pic'=>$pic,'val'=>$val,'pics'=>$pics]);
   }


}
