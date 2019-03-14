<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Carts;


class CartsController extends Controller
{
    /**
     * 查询购物车数量
     *
     * @return \Illuminate\Http\Response
     */
    public static function carts_count()
    {
        $cart = Carts::get();
        $cart->tiao = $cart->count();
        $sum = 0;
        foreach($cart as $k=>$v){
            $sum += $v->cart_good[0]->price * $v->cnt;
        }
        $cart->sum = $sum;
        return $cart;
    }
    /**
     * 加入购物车
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request,$cnt,$gid)
    {
        //如果是同一件商品就在原基础上加一
        $cartss = Carts::where('gid',$gid)->first();
        if(!empty($cartss)){
            $cartss->cnt += $cnt;
            $cartss->save();
            if($cartss->save()){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            $id = $request->session()->get('id');
            $carts = new Carts;
            $carts->uid = $id;
            $carts->gid = $gid;
            $carts->cnt = $cnt;
            if($carts->save()){
                echo 1;
            }else{
                echo 0;
            }
        }
    }

    /**
     * 减商品数量
     *
     * @return \Illuminate\Http\Response
     */
    public function jian($cid){

        $carts = Carts::where('cid',$cid)->first();
        if($carts->cnt>1){
            $carts->cnt = $carts->cnt-1;
        }else if($carts->cnt=1){
            $carts->cnt = 1;
        }
        if($carts->save()){
            return view('home.carts.jian',['jian'=>$carts->cnt]);
        }
    }

    public function jia($cid){
        $carts = Carts::where('cid',$cid)->first();
        $carts->cnt = $carts->cnt+1;
        if($carts->save()){
            return view('home.carts.jia',['jia'=>$carts->cnt]);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $id = $request->session()->get('id');
        $carts = Carts::where('uid',$id)->get();
        return view('home.carts.index',['carts'=>$carts]);
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
        //
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dele($id)
    {
        //删除订单
        $res = Carts::destroy($id);
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }
}
