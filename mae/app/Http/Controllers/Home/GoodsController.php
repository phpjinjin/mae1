<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\GoodsPic;
use App\Models\Goodval;
use App\Models\Cate;


class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request->input('count',15);
        $search = $request->input('search','');
        $tiao = Goods::count();
        $data = Goods::where('gname','like','%'. $search.'%')->paginate($count);
<<<<<<< HEAD
=======
        $pid_data = Cate::where('pid',0)->get(); //一级分类  用途 花材
        // foreach($pid_data as $k=>$v){
        //     $v['sub']=>Cate::where('pid',$v->id)->get(); //二级分类 鲜花类别
        //     foreach ($v['sub'] as $kk=>$vv){
        //         $vv['sub'] = Cate::where('pid',$vv->id)->get(); //三级类
        //     }
        // }
>>>>>>> origin/7zc
        return view('home.goods.index',['goods'=>$data,'request'=>$request->all(),'tiao'=>$tiao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $goods = Goods::where('gid',$id)->first();
        $pic = $goods->goodspic;
        $val = $goods->goodsval;
        $pics = count($pic);
        
        return view('home.goods.show',['goods'=>$goods,'pic'=>$pic,'val'=>$val,'pics'=>$pics]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
