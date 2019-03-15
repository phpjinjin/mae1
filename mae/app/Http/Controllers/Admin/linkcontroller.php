<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Link;
use App\Http\Requests\LinkRequest;
class linkcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = $request->except(['_token']);
        //默认一页显示的数据条数
        $res = $request->input('count','5');
        //取link表的数据总数
        $count = Link::count();
        //获取请求的参数
        $search = $request->input('search','');
        //条件分页
        $data = Link::where('lname','like','%'. $search.'%')->paginate($res);
        $count = Link::where('lname','like','%'. $search.'%')->count();
        return view('admin.link.index',['data'=>$data,'request'=>$request->all(),'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        DB::beginTransaction();
        $link = new Link;
        $link->lname = $request->lname;
        $link->lurl = $request->lurl;
        //dd($request->has('limg'));

        //图片上传处理
        //创建上传对象
        $file = $request->limg;
        // 获取后缀
        $ext = $file->extension();
        $file_name = time()+mt_rand(10000,99999).'.'.$ext;
        //;dd($file_name);
        //上传
        $limg = $file->storeAs('/link',$file_name);
        $link->limg = $file_name;

        $res = $link->save();
        if($res){
            DB::commit();
            return redirect('admin/link')->with('success','添加成功');
        }else{
            DB::rollBack();
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
        $data = Link::where('lid',$id)->get();
        return view('admin.link.edit',['data'=>$data]);
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
        //dd($request);
        //通过表单传过来的id找到指定内容
        $link = Link::find($id);
        //判断是否有文件上传
        if ($request->hasFile('limg')) {
            //创建文件上传对象
            $file = $request->file('limg');
            // 获取文件后缀
            $ext = $file->extension();
            // 拼接名称
            $file_name = time()+mt_rand(10000,99999).'.'.$ext;
            //执行上传
            $img = $file->storeAs('/link',$file_name);
            //数据内的指定字段赋值
            $link->limg = $file_name;
        }else{
            //如果没有文件上传让他等于自己
              $link->limg = $link->limg;         
        }
        //默认参数设置如果有让他等于没有让他为空
         $link->lname = $request->input('lname','');
         $link->lurl = $request->input('lurl','');
         //执行操作
         $res1 = $link->save();
         if($res1){
            return redirect('admin/link ')->with('success','修改成功');
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
        //dd('1233');
        $del = Link::destroy($id);
        //判断是否正常
        if($del){
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
           //异常弹回
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }
}
