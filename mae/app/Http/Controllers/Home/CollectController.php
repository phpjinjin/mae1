<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods_collect;
use App\Models\Goods;
use DB;
class CollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home.collect.index');
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
        // DB::beginTransaction();
        // $collect = new Goods_collect;
        // $collect->uid = $request->uid;
        // $collect->gid = $request->gid;
        // $time = date('Y-m-d',time());
        // $collect->collect_time = $time;

        // $res = $link->save();

        // if($res){
        //     DB::commit();
        //     return redirect('Home/collect')->with('success','添加成功');
        // }else{
        //     DB::rollBack();
        //     return back()->with('error','添加失败');
        // }
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

    public function delete($id)
    {
        //
        // $del = Goods_collect::destroy($id);
        // //判断是否正常
        // if($del){
        //     return redirect($_SERVER['HTTP_REFERER'])->with('qxcg','删除成功');
        // }else{
        //    //异常弹回
        //     return redirect($_SERVER['HTTP_REFERER'])->with('qxerror','删除失败');
        // }
    }
    
}
