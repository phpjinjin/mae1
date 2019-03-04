<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goodval;
use App\Models\Goods;
use App\Models\Cate;
use DB;

class GoodvalController extends Controller
{
    public static function getCate(){
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
        $goodval = Goodval::where('wood','like','%'. $search.'%')->paginate($count);
        $tiao = Goodval::count();
        foreach ($goodval as $k=>$v){
           $v->gid = Goods::where('gid',$v->gid)->first()->gname;
        }
        //获取类别名称
        
        return view('admin.goodval.index',['goodval_data'=>$goodval,'request'=>$request->all(),'tiao'=>$tiao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {
        return view('admin.goodval.create',['id'=>$id,'cate_data'=>self::getCate()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  数据验证
        $this->validate($request, [
            'gvname' => 'required',
            'tid' => 'required',
            'value' => 'required',
        ],[
            'gvname.required'=>'名称必填',
            'tid.required'=>'类别必填',
            'value.required'=>'属性值必填',
        ]);
        //接受数据
        $data = $request->all();
        

        $goodval = new Goodval;
        $goodval->gvname = $data['gvname'];
        $goodval->tid = $data['tid'];
        $goodval->value = $data['value'];
        
        if($goodval->save()){
            return redirect('/admin/goodval')->with('success','添加成功');
        }else{
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
        $goodval = Goodval::where('vid',$id)->first();
        $gname = Goods::where('gid',$goodval->gid)->first()->gname;
        return view('admin.goodval.show',['goodval'=>$goodval,'gname'=>$gname]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Goodval::where('vid',$id)->first();
        $gname = Goods::where('gid',$data->gid)->first()->gname;
        return view('admin.goodval.edit',['goodval'=>$data,'gname'=>$gname]);
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
        $goodval = Goodval::find($id);
        $goodval->wood = $data['wood'];
        $goodval->pack = $data['pack'];
        $goodval->lang = $data['lang'];
        
        if($goodval->save()){
            return redirect('/admin/goodval')->with('success','修改成功');
        }else{
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
        if(Goodval::destroy($id)){
            return redirect('/admin/goodval')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
