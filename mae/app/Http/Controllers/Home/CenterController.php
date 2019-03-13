<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\Users;
use App\Models\UsersDetail;
use DB;
use Hash;
class CenterController extends Controller
{

	public function index(Request $request)
	{
		
	// 	if ($request->session()->exists('uname')) {
		
	// }
		
		$id = session('id');
        $user = Users::find($id);
        $userd = UsersDetail::where('user_id',$id)->get();
        return view('home.personal.information',['user'=>$user,'userd'=>$userd]);
		

	}


	 /**
     *订单列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request){
	    session(['key' => 'value']);
	    session(['key1' => '1']);

		 $data = $request->session()->get('key1');
		
	   	$order = Orders::where('uid','=',$data)->get();

   		return view('home.personal.order',['order'=>$order]);
    }
    /**
     *取消订单
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
	    $res = Orders::find($id);
     
        $orders = Orders::destroy($id);
        $ordersdetail = OrdersDetail::destroy($res->ordersdetail->oid);  
        if($orders && $ordersdetail){
        	echo '1';
        }else{
        	echo '0';
        }
        
    }
    /**
     * 个人信息
     * @return [type] [description]
     */
    public function create(){
        
        $id = session('id');
        $user = Users::find($id);
        $userd = UsersDetail::where('user_id',$id)->get();
        return view('home.personal.information',['user'=>$user,'userd'=>$userd]);
    }
    public function edit($id){

        $id = session('id');
        if(session('id') == $id){
            $user = Users::find($id);
            $userd = UsersDetail::where('user_id',$id)->get();
            
        }
        return view('home.personal.edit',['user'=>$user,'userd'=>$userd]);
    }
    public function store(Request $request,$id)
    {
            
            //开启事物
            DB::beginTransaction();
            //通过表单传过来的id找到指定内容
            $userd = UsersDetail::where('user_id',$id)->first();
            $userd->phone =$request->input('phone');
            
               //判断是否有文件上传
                if ($request->hasFile('pic')) {
                    //创建文件上传对象
                    $file = $request->file('pic');
                    // 获取文件后缀
                    $ext = $file->extension();
                    // 拼接名称
                    $file_name = time()+mt_rand(1000565,6656556).'.'.$ext;
                    //执行上传
                    $res = $file->storeAs('/users',$file_name);
                    //数据内的指定字段赋值
                    $userd->face = $file_name;
                }else{
                    $userd->face = $userd->face;
                }           
            $users = Users::find($id);
            $users->pname = $request->input('pname');
            $users->uname = $request->input('uname');
            $users->sex = $request->input('sex');
            $res1 = $users->save();

            $res2  = $userd->save();

            if($res1 && $res2){
                DB::commit();
                return redirect('/home/center/information')->with('success','修改成功');        
            }else{
                DB::rollBack();
            return back()->with('error','修改失败');
            }
           

    }

    /**
     * 
     * 修改密码
     * @return [type] [description]
     */
    public function password()
    {   
        $id = session('id');

        $users = Users::find($id);
        //加载修改密码页面
        return view('home.personal.password',['users'=>$users]);
    }

    /**
     * 将修改密码存入数据库
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function save(Request $request)
    {   

        //
        $id = session('id');
        $users = Users::find($id);
        $d = $users->password;
        //接收数据
        $data = $request->except('_token');
        $password = $data['password'];
        $pass1 = $data['pass1'];
        $pass2 = $data['pass2'];

        if(!Hash::check($password,$d)){
            return back()->with('error','原密码错误');
        }else{
            if($pass1 != $pass2 ){
                return back()->with('error','修改密码两次不一致');
            }else{
                $users -> password = Hash::make($pass1);
                $users->save();
                return redirect('home/center/information')->with('success','修改成功');
            }

        }

    }

}
