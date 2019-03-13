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
     * 加入收藏
     *
     * @return \Illuminate\Http\Response
     */

    public function add($gid)
    {
        $res = Goods_collect::where('gid',$gid)->first();
        
        if(!count($res)){
            $coll = new Goods_collect;
            $coll->gid = $gid;
            $coll->uid = 9;
            $time = date('Y-m-d',time());
            $coll->collect_time = $time;
            if($coll->save()){
                return view('home.collect.cheng',['coll'=>'取消']);
            }else{
                return view('home.collect.shi',['coll'=>'收藏失败'] );
            }
        }else{
            Goods_collect::where('gid',$gid)->delete();
            return view('home.collect.shi',['coll'=>'收藏']);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if(session('login')){
            $collect = Goods_collect::all();
            $goods = [];
            // dd($collect);
            foreach ($collect as $k => $v) {
                $data = Goods::where('gid',$v['gid'])->get();
                $goods[] = $data[0];
            }
            return view('home.collect.index',['goods'=>$goods]);
        }else{
            return redirect($_SERVER['HTTP_REFERER'])->with('gologin','请先登录');
        }
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
    public function store(Request $request,$id)
    {
        //
        DB::beginTransaction();
        $collect = new Goods_collect;
        // $collect->uid = $request->uid;

        $collect->gid = $id;
        
        $time = date('Y-m-d',time());
        $collect->collect_time = $time;

        $res = $collect->save();

        if($res){
            DB::commit();
            return back()->with('sccg','添加成功');
        }else{
            DB::rollBack();
            return back()->with('scerror','添加失败');
        }
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
        // dd($id);
        $del = Goods_collect::where('gid',$id)->delete();

        //判断是否正常
        if($del){
            return redirect($_SERVER['HTTP_REFERER'])->with('qxcg','删除成功');
        }else{
           //异常弹回
            return redirect($_SERVER['HTTP_REFERER'])->with('qxerror','删除失败');
        }
    }
    
}
