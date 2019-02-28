<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate;
use DB;
class CateController extends Controller
{
    public static function getCate(){
        $cate = Cate::select('*',DB::raw("concat(path,',',ggid) as paths"))->orderBy('paths','asc')->get();
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

        $cate = Cate::select('*',DB::raw("concat(path,',',ggid) as paths"))->where('gtname','like','%'. $search.'%')->orderBy('paths','asc')->paginate($count);
        //$cate = Cate::where('gtname','like','%'. $search.'%')->paginate($count);
        $tiao = Cate::count();
        foreach ($cate as $k=>$v){
            //统计path中 , 出现的次数
            $n = substr_count($v->path,',');
            //重复使用一个字符串
            $cate[$k]->gtname = str_repeat('|--',$n).$v->gtname;
        }
        return view('admin.cate.index',['cate_data'=>$cate,'request'=>$request->all(),'tiao'=>$tiao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {
        return view('admin.cate.create',['id'=>$id,'cate_data'=>self::getCate()]);
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
            'gtname' => 'required',
            
        ],[
            'gtname.required'=>'名称必填',
        ]);
        //接受数据
        $data = $request->all();
        //获取父级id
        if($data['pid'] == 0){
            $data['path'] = 0;
        }else{
            //获取父级分类信息
            $parent_data = Cate::find($data['pid']);
            //拼接路径  父级path,id
            $data['path'] = $parent_data->path.','.$parent_data->ggid;
        }

        $cate = new Cate;
        $cate->gtname = $data['gtname'];
        $cate->pid = $data['pid'];
        $cate->path = $data['path'];
        $cate->status = 1;
        if($cate->save()){
            return redirect('/admin/cate')->with('success','添加成功');
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
        //检查当前分类下是否有子分类
        $child_data = Cate::where('pid',$id)->first();
        if($child_data){
            return back()->with('error','当前分类下有子分类,不能删除');
        }

        //执行删除
        if(Cate::destroy($id)){
            return redirect('/admin/cate')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
