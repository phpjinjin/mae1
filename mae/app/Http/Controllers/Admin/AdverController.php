<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adver;
use DB;
class AdverController extends Controller
{
    /**
     * 广告列表页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        //默认一页显示两条数据
        $res = $request->input('count','2');
        //取Adver广告表的数据总数
        $res1 = Adver::count();
        //获取请求的参数
        $search = $request->input('search','');
        //条件分页
        $data = Adver::where('atitle','like','%'. $search.'%')->paginate($res);
         //加载广告模版分配数据
        return view('admin.adver.index',['data'=>$data,'request'=>$request->all(),'res1'=>$res1]);
    }

    /**
     * 广告添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载广告添加模版
        return view('admin.adver.create');

    }

    /**
     * 广告添加执行
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
       
       $this->validate($request, [
           'amsg' => 'required',
            'atitle' => 'required',
            'apic' => 'required',
             'aurl' => 'required',
            
        ],[
            'amsg.required'=>'客户信息必填',
            'atitle.required'=>'广告标题必填',
            'apic.required'=>'广告图片必填',
            'aurl.required'=>'广告链接必填',

        ]);

        //创建文件上传对象
        $file = $request->file('apic');
        // 获取文件后缀
        $ext = $file->extension();
        // 拼接名称
        $file_name = time()+mt_rand(1000565,6656556).'.'.$ext;
       //执行上传
        $res = $file->storeAs('/adver',$file_name);
         //接收表单数据
        $data = $request->except(['_token']);
        //new一个模型
        $adver = new Adver;
        //模型中的广告表属性赋值表单传过来的值
        $adver->amsg = $data['amsg'];
        $adver->atitle = $data['atitle'];
        $adver->apic = $file_name;
        $adver->aurl = $data['aurl'];
         $adver->astatus = $data['astatus'];
        //提交添加的信息
        $res1 = $adver->save();
        //判断是否成功
         if($res1){
            
            return redirect('admin/adver')->with('success','添加成功');
      
        }else{
           
            return back()->with('error','添加失败');
        }


   
    }

    /**
     * 上架和下刊
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //找到指定表单传过来的id值
        $data =  Adver::find($id);
        //判断表单传过来的id值找到指定的字段判断然后执行
        if($data['astatus'] == 0){
            $data->astatus = 1;
            $data->save();

            return redirect('admin/adver ')->with('success','修改成功');

        }elseif($data['astatus'] == 1){

            $data->astatus = 0;

            $data->save();

            return redirect('admin/adver ')->with('success','修改成功');

        }else{

            return back()->with('error','修改失败');
        }


    }

    /**
     * 广告修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //通过表单传过来的id找到指定的数据
         $adver = Adver::find($id);
        // 显示修改模板 加载数据
        return view('admin.adver.edit',['adver'=>$adver]);
    }

    /**
     * 执行文件修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            //通过表单传过来的id找到指定内容
            $adver = Adver::find($id);
            //判断是否有文件上传
            if ($request->hasFile('apic')) {
                //创建文件上传对象
                $file = $request->file('apic');
                // 获取文件后缀
                $ext = $file->extension();
                // 拼接名称
                $file_name = time()+mt_rand(1000565,6656556).'.'.$ext;
                //执行上传
                $res = $file->storeAs('/adver',$file_name);
                //数据内的指定字段赋值
                $adver->apic = $file_name;
            }else{
                //如果没有文件上传让他等于自己
                  $adver->apic = $adver->apic;           
            }
            //默认参数设置如果有让他等于没有让他为空
             $adver->amsg = $request->input('amsg','');
             $adver->atitle = $request->input('atitle','');
             $adver->aurl = $request->input('aurl','');
             //执行操作
             $res1 = $adver->save();
             if($res1){
                return redirect('admin/adver ')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }


    }

    /**
     * 执行删除
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
         
    $res = Adver::destroy($id);
	   //  判断是否成功返回数据
	     if($res){
	     	echo '1';
	     }else{

	     	echo 0;
	     }
    }
}
