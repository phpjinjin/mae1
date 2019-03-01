<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Works;
use DB;
class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          //默认一页显示两条数据
        $res = $request->input('count','2');
        //取Works广告表的数据总数
        $res1 = Works::count();
        //获取请求的参数
        $search = $request->input('search','');
        //条件分页
        $data = Works::where('wtitle','like','%'. $search.'%')->paginate($res);
        
         //加载广告模版分配数据
        return view('admin.works.index',['data'=>$data,'request'=>$request->all(),'res1'=>$res1]);
        
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//执行添加信息
		  $this->validate($request, [
           'wtitle' => 'required',
            'wuname' => 'required',
            'wpic' => 'required',
             'wcontent' => 'required',
            
        ],[
            'wtitle.required'=>'文章标题必填',
            'wuname.required'=>'文章作者必填',
            'wpic.required'=>'文章图片必填',
            'wcontent.required'=>'文章内容必填',

        ]);
		//创建文件上传对象
        $file = $request->file('wpic');
        // 获取文件后缀
        $ext = $file->extension();
        // 拼接名称
        $file_name = time()+mt_rand(1000565,6656556).'.'.$ext;
       //执行上传
        $res = $file->storeAs('/works',$file_name);
         //接收表单数据
        $data = $request->except(['_token']);
        //new一个模型
        $works = new Works;
        //模型中的广告表属性赋值表单传过来的值
        $works->wtitle = $data['wtitle'];
        $works->wuname = $data['wuname'];
        $works->wpic = $file_name;
        $works->wcontent = $data['wcontent'];
         $works->wstatus = $data['wstatus'];
        //提交添加的信息
        $res1 = $works->save();
        //判断是否成功
         if($res1){
            
            return redirect('admin/works')->with('success','添加成功');
      
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
        $data = DB::table('works')->where('wid',$id)->first();


        return view('admin.works.show',['data'=>$data]);

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
         $works = DB::table('works')->where('wid',$id)->first();

        return view('admin.works.edit',['works'=>$works]);
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
         //通过表单传过来的id找到指定内容
            $works = Works::find($id);
            //判断是否有文件上传
            if ($request->hasFile('wpic')) {
                //创建文件上传对象
                $file = $request->file('wpic');
                // 获取文件后缀
                $ext = $file->extension();
                // 拼接名称
                $file_name = time()+mt_rand(1000565,6656556).'.'.$ext;
                //执行上传
                $res = $file->storeAs('/works',$file_name);
                //数据内的指定字段赋值
                $works->wpic = $file_name;
            }else{
                //如果没有文件上传让他等于自己
                  $works->wpic = $works->wpic;           
            }
            //默认参数设置如果有让他等于没有让他为空
             $works->wtitle = $request->input('wtitle','');
             $works->wuname = $request->input('wuname','');
             $works->wcontent = $request->input('wcontent','');
             //执行操作
             $res1 = $works->save();

             if($res1){

                return redirect('admin/works' )->with('success','修改成功');
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
        //删除操作找到表单传过来的id值找到对应数据执行删除
        $res1 = Works::destroy($id);
        //判断是否正常
        if($res1){
            
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
           //异常弹回
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }

    public function putaway($id)
    {
        //找到指定表单传过来的id值
        $data =  Works::find($id);
        //判断表单传过来的id值找到指定的字段判断然后执行
        if($data['wstatus'] == 0){
            $data->wstatus = 1;
            $data->save();

            return redirect('admin/works ')->with('success','修改成功');

        }elseif($data['wstatus'] == 1){

            $data->wstatus = 0;

            $data->save();

            return redirect('admin/works ')->with('success','修改成功');

        }else{

            return back()->with('error','修改失败');
        }


    }

}
