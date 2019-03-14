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
     * 共享类别
     *
     * @return \Illuminate\Http\Response
     */
    public static function getCate($pid = 0)
    {
        $pid_data = Cate::where('pid',$pid)->get();
        $arr = [];
        foreach($pid_data as $k=>$v){
            $v['sub'] = self::getCate($v->tid);
            $arr[] = $v;
        }
        return $arr;
    }
    /**
     * 浏览量排行
     *
     * @return \Illuminate\Http\Response
     */
    public static function good_Hot()
    {
        $arr = Goods::orderBy('hot','desc')->get();
        return $arr;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request->input('count',16);
        $search = $request->input('search','');
        $tid = $request->input('tid','');
        $msg = $request->input('msg','');
        //判断是否存在类别搜索
        if($tid === ""){
            //根据条件排序
            switch ($msg)
            {
                case "price1":
                
                    $data = Goods::where('gname','like','%'. $search.'%')->orderBy('price','asc')->paginate($count);
                    $tiao = $data->count();
                    break;

                case "price2":
                
                    $data = Goods::where('gname','like','%'. $search.'%')->orderBy('price','desc')->paginate($count);
                    $tiao = $data->count();
                    break;

                case "salecnt":
                
                    $data = Goods::where('gname','like','%'. $search.'%')->orderBy('salecnt','desc')->paginate($count);
                    $tiao = $data->count();
                    break;

                case "time":
                
                    $data = Goods::where('gname','like','%'. $search.'%')->orderBy('created_at','desc')->paginate($count);
                    $tiao = $data->count();
                    break;

                default:
                
                    $data = Goods::where('gname','like','%'. $search.'%')->paginate($count);
                    $tiao = $data->count();
            }
        }else{
            $data = Goods::where('tid',$tid)->paginate($count);
            $tiao = $data->count();
        }
        
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
        //浏览量递增
        $goods->hot += 1;
        $goods->save();
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
