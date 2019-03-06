<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Works;


class ArticleController extends Controller
{
    //文章页面
   public function index()
   {
   		$works = Works::where('wstatus','=',1)->get();
   		return view('home.article.index',['works'=>$works]);
   }


}
