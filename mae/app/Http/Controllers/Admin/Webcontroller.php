<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Webs;
use App\Http\Requests\WebRequest;
use DB;
class Webcontroller extends Controller
{
    //
    public function index(Request $request)
    {
    	$status = $request->status;
    	//dump($status);
    	$webs = Webs::where('wid','2')->get();

    	
    	return view('admin.web.index',['webs'=>$webs]);
    }
    public function edit()
    {
    	$webs = Webs::where('wid','2')->get();
    	return view('admin.web.edit',['webs'=>$webs]);
    }
    public function update(WebRequest $request)
    {
    	$wid = $request['wid'];

    	// $logo = $request->has('logo');
    	// dd($logo);
    	DB::beginTransaction();
        $web = Webs::find($wid);
    	if ($request->has('logo')){
            $file = $request->logo;//创建文件上传对象

            // 获取文件后缀
            $ext = $file->extension();
            $file_name = time()+mt_rand(10000,99999).'.'.$ext;
            //;dd($file_name);
            //上传
            $logo = $file->storeAs('/web',$file_name);
            $web->logo = $file_name;
        }
        
        
        $web->web_name = $request->input('web_name','');
        $web->describe = $request->input('describe','');
        $web->filing = $request->input('filing','');
        $web->telephone = $request->input('telephone','');
        $web->cright = $request->input('cright','');
        $web->status = $request->input('status','');

        $res = $web->save();
        if($res){
            DB::commit();
            return redirect('admin/web')->with('success','修改成功');
        }else{
            DB::rollBack();
            return back()->with('error','修改失败');
        }
	}

}
