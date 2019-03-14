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
use App\Models\Goods;

class CenterController extends Controller
{

	public function index(Request $request)
	{
		//获取用户id		
		$id = session('id');
        //通过id查询用户表中数据
        $user = Users::find($id);
        //通过外键查询用户详情表中数据
        $userd = UsersDetail::where('user_id',$id)->get();
        //显示模板加载视图
        return view('home.personal.information',['user'=>$user,'userd'=>$userd]);
		
	}


	 /**
     *订单列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request){
	     $id = $request->session()->get('id');

		
		
	   	$order = Orders::where('uid',$id)->get();

   		return view('home.personal.order',['order'=>$order]);
    }
    /**
     *取消订单
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
	    $res = Orders::find($id);
        $res1 = OrdersDetail::where('oid',$id)->get();
        $orders = Orders::destroy($id);
      foreach ($res1 as $k =>$v) {
               $ordersdetail = OrdersDetail::destroy($v->odid);  
      }
        
        
       
        
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
        
        //获取用户id        
        $id = session('id');
        //通过id查询用户表中数据
        $user = Users::find($id);
        //通过外键查询用户详情表中数据
        $userd = UsersDetail::where('user_id',$id)->get();
        // 显示模板加载视图
        return view('home.personal.information',['user'=>$user,'userd'=>$userd]);
    }
    public function edit($id){
        //获取用户id  
        $id = session('id');
        //判读实参id是否正确
        if(session('id') == $id){
            //通过id查询用户表中数据
            $user = Users::find($id);
            //通过外键查询用户详情表中数据
            $userd = UsersDetail::where('user_id',$id)->get();           
        }
        //显示模板加载视图
        return view('home.personal.edit',['user'=>$user,'userd'=>$userd]);
    }
    public function store(Request $request,$id)
    {
            
            //开启事物
            DB::beginTransaction();
            //通过表单传过来的id找到指定内容
            $userd = UsersDetail::where('user_id',$id)->first();
            //获取用户手机号
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
                //给头像默认值
                $userd->face = $userd->face;
            }   
            //通过id获取用户表中数据        
            $users = Users::find($id);
            //将表单传过来的值赋值给模型
            $users->pname = $request->input('pname');
            $users->uname = $request->input('uname');
            $users->sex = $request->input('sex');
            //提交保存数据
            $res1 = $users->save();
            $res2  = $userd->save();
            //判读是否存储成功
            if($res1 && $res2){
                DB::commit();
                return redirect('/home/center/information')->with('success','修改成功');        
            }else{
                DB::rollBack();
            return back()->with('error','修改失败');
            }
    
    }       
     /**
     *订单详情
     *
     * @return \Illuminate\Http\Response
     */
     public function show(Request $request,$id)
     {
        $uid =   $request->session()->get('id');
           $orders = Orders::where('uid',$uid)->get();
       foreach ($orders as $k => $v) {
       
            $goods = Goods::where('gid',$v->ordersdetail->gid)->get();
            
       }
       foreach ($goods as $kk => $vv) {
              dump($vv->goodspic[0]);
       }

        return view('home.personal.show',['orders'=>$orders,'goods'=>$goods]);

     }

    /**
     * 
     * 修改密码
     * @return [type] [description]
     */
    public function password()
    {   
        //获取用户id
        $id = session('id');
        //通过id查询用户表
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

        /获取用户id
        $id = session('id');
        //通过id查询用户表
        $users = Users::find($id);
        //取得用户密码
        $d = $users->password;
        //接收数据
        $data = $request->except('_token');
        $password = $data['password'];
        $pass1 = $data['pass1'];
        $pass2 = $data['pass2'];
        //判断原密码是否正确
        if(!Hash::check($password,$d)){
            return back()->with('error','原密码错误');
        }else{
            //判断两次密码是否一致
            if($pass1 != $pass2 ){
                return back()->with('error','修改密码两次不一致');
            }else{
                // 将新密码进行加密
                $users -> password = Hash::make($pass1);
                //提交保存数据
                $users->save();
                return redirect('home/center/information')->with('success','修改成功');
            }

        }

    }

}
