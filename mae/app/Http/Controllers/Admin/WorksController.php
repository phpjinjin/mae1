<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Works;
use DB;
class WorksController extends Controller
{
    /**
     *文章列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          //默认一页显示两条数据
        $res = $request->input('count','2');
        //取Works文章表的数据总数
        $res1 = Works::count();
        //获取请求的参数
        $search = $request->input('search','');
        //条件分页
        $data = Works::where('wtitle','like','%'. $search.'%')->paginate($res);
        
         //加载广告模版分配数据
        return view('admin.works.index',['data'=>$data,'request'=>$request->all(),'res1'=>$res1]);
        
    } 

    /**
     * 文章添加页面加载
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载页面
        return view('admin.works.create');
    }

    /**
     * 执行添加操作
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
        //模型中的文章表属性赋值表单传过来的值
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
     * 加载文章详情
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //找到传过来的wid
        $data = DB::table('works')->where('woid',$id)->first();


        return view('admin.works.show',['data'=>$data]);

    }

    /**
     * 加载修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        //找到传值过来的id
         $works = DB::table('works')->where('woid',$id)->first();

        return view('admin.works.edit',['works'=>$works]);
    }

    /**
     * 执行修改信息
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
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
   

    }
     /**
     * 执行删除操作方法
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
         
     if(Works::destroy($id)){
     	echo '1';
     	
     }else{

     	echo 0;
     }

    }
    /**
     * 文章上架下架
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function putaway($id)
    {
        //找到指定表单传过来的id值
        $data =  Works::find($id);
        //判断表单传过来的id值找到指定的字段判断然后执行
        if($data['wstatus'] == 1){
            $data->wstatus = 2;
            $res1 = $data->save();

	         if($res1){
	               return redirect('admin/works ')->with('success','修改状态成功');
	            }else{

	                return back()->with('error','修改状态失败');
	            }

        }elseif($data['wstatus'] == 2){

            $data->wstatus = 1;

        	$res1 =   $data->save();
	         if($res1){
	               return redirect('admin/works ')->with('success','修改状态成功');
	            }else{

	                return back()->with('error','修改状态失败');
	            }
            

        }

            
        


    }

}
