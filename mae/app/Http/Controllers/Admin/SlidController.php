<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slid;
class SlidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request->input('count',5);
        $search = $request->input('search','');
        $tiao = Slid::count();
        $data = Slid::where('stitle','like','%'. $search.'%')->paginate($count);
        return view('admin.slid.index',['slid'=>$data,'request'=>$request->all(),'tiao'=>$tiao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slid.create');
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
            'stitle' => 'required',
            'surl' => 'required',
            'sort' => 'required',
            'simg' => 'required',
            'nid' => 'required',
        ],[
            'stitle.required'=>'标题必填',
            'surl.required'=>'地址必填',
            'sort.required'=>'排序必填',
            'simg.required'=>'路径必填',
            'nid.required'=>'状态必填',
        ]);

        //接受数据
        $data = $request->all();


        $file = $request->file('simg');
        $ext = $file->extension();
        $file_name = rand(10000,99999).'.'.$ext;
        $file->storeAs('/slid',$file_name);

        $slid = new Slid;
        $slid->stitle = $data['stitle']; //图片标题
        $slid->surl = $data['surl'];     //跳转地址
        $slid->sort = $data['sort'];     //排序
        $slid->simg = $file_name; //图片地址
        $slid->nid = $data['nid'];
        
        if($slid->save()){
            return redirect('/admin/slid')->with('success','添加成功');
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
        $slid_data = Slid::where('sid',$id)->first();
        if($slid_data->nid == 1){
            $slid_data->nid = 2;
        }else{
            $slid_data->nid = 1;
        }
        $slid_data->save();
        return redirect('/admin/slid');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Slid::where('sid',$id)->first();
        return view('admin.slid.edit',['slid'=>$data]);
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
        //接受数据
        $data = $request->all();
        $slid = Slid::where('sid',$id)->first();
        //如果没有上传就
        if(!$request->hasFile('simg')){
            $slid->simg = $data->simg;
        }else{
            $file = $request->file('simg');
            $ext = $file->extension();
            $file_name = rand(10000,99999).'.'.$ext;
            $file->storeAs('/slid',$file_name);
            $slid->simg = $file_name;
        }

        $slid->stitle = $data['stitle']; //图片标题
        $slid->surl = $data['surl'];     //跳转地址
        $slid->sort = $data['sort'];     //排序
         //图片地址
        $slid->nid = $data['nid'];
        
        if($slid->save()){
            return redirect('/admin/slid')->with('success','修改成功');
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
        if(Slid::destroy($id)){
            return redirect('/admin/slid')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
