<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GoodsStoreRequest;
use App\Models\Goods;
use App\Models\Cate;
use App\Models\GoodsPic;
use App\Models\Goodval;
use App\Models\Goods_collect;
use DB;

class GoodsController extends Controller
{
    public static function getCate()
    {
        $cate = Cate::select('*',DB::raw("concat(path,',',tid) as paths"))->orderBy('paths','asc')->get();
        foreach ($cate as $k=>$v){
            //统计path中 , 出现的次数
            $n = substr_count($v->path,',');
            //重复使用一个字符串
            $cate[$k]->gtname = str_repeat('|--',$n).$v->gtname;
        }
        return $cate;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request->input('count',5);
        $search = $request->input('search','');

        $tiao = Goods::count();
        $data = Goods::where('gname','like','%'. $search.'%')->paginate($count);
        return view('admin.goods.index',['goods'=>$data,'request'=>$request->all(),'tiao'=>$tiao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.goods.create',['cate'=>self::getCate()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsStoreRequest $request)
    {
        /*
            开启事务   DB::beginTransaction();
            提交事务    DB::commit()
            回滚事务   DB::rollBack()

         */
        

        // DB::beginTransaction();


        $data = $request->all();
        $goods = new Goods;
        $goods->gname = $data['gname'];
        $goods->tid = $data['tid'];
        $goods->price = $data['price'];
        $goods->stock = $data['stock'];
        $goods->color = $data['color'];
        $goods->salecnt = 0;
        $goods->hot = 0;
        $res1 = $goods->save();
        $gid = $goods->gid;
        //添加属性
        $arr = new Goodval;
        $arr->gid = $gid;
        $arr->wood = $data['wood'];
        $arr->lang = $data['lang'];
        $arr->pack = $data['pack'];
        $res = $arr->save();

        //添加图片
        $gname = $goods->gname;
        $file = $request->file('pic');
        foreach ($file as $k=>$v){
            $goodspic = new GoodsPic;
            $ext = $v->extension();
            $file_name = rand(10000,99999).'.'.$ext;
            $res = $v->storeAs('/gpic',$file_name);
            $goodspic->gid = $gid;
            $goodspic->gpic = $file_name;
            $goodspic->gname = $gname;
            $res2 = $goodspic->save();
        }

        if($res1 && $res2){
            // DB::commit();
            return redirect('/admin/goods')->with('success','添加成功');
        }else{
            // DB::rollBack();
            return back()->with('error','添加失败');
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
        $goods = Goods::where('gid',$id)->first();
        $pic = $goods->goodspic;
        $val = $goods->goodsval;

        return view('admin.goods.show',['goods'=>$goods,'pic'=>$pic,'val'=>$val]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Goods::where('gid',$id)->first();
        $pic = GoodsPic::where('gid',$data->gid)->get();

        return view('admin.goods.edit',['goods'=>$data,'pic'=>$pic,'cate'=>self::getCate()]);
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

        $data = $request->all();
        $goods = Goods::where('gid',$id)->first();
        $goods->gname = $data['gname'];
        $goods->tid = $data['tid'];
        $goods->price = $data['price'];
        $goods->stock = $data['stock'];
        $goods->color = $data['color'];
        $res1 = $goods->save();
        $gname = $goods->gname;
        $id = $goods->gid;
        $goodPicName = GoodsPic::where('gid',$id)->get();
        
        foreach ($goodPicName as $k=>$v){
            $v->gname = $gname;
            $v->save();
        }
        //添加图片
        //根据选中id删除
        if(!empty($data['picid'])){
            GoodsPic::destroy($data['picid']);
        }
        if ($request->has('pic')){
            $file = $request->file('pic');
            foreach ($file as $k=>$v){
                $goodspic = new GoodsPic;
                $ext = $v->extension();
                $file_name = rand(10000,99999).'.'.$ext;
                $res = $v->storeAs('/gpic',$file_name);
                $goodspic->gid = $goods->gid;
                $goodspic->gpic = $file_name;
                $goodspic->gname = $gname;
                $res2 = $goodspic->save();
            }
        }

        //修改属性
        $arr = Goodval::where('gid',$id)->first();
        $arr->gid = $id;
        $arr->wood = $data['wood'];
        $arr->lang = $data['lang'];
        $arr->pack = $data['pack'];
        $res2 = $arr->save();

        if($res1 && $res2){
            // DB::commit();
            return redirect('/admin/goods')->with('success','修改成功');
        }else{
            // DB::rollBack();
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //执行删除
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dele($id)
    {
        //删除商品
        $res1 = Goods::destroy($id);
        //删除属性
        $res1 = Goodval::where('gid',$id)->delete();
        //删除图片
        $res3 = GoodsPic::where('gid',$id)->delete();

        if(($res1 && $res2) && $res3){
            echo 1;
        }else{
            echo 0;
        }
        
    }
}
