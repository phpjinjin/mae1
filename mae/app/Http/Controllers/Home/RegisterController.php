<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UsersDetail;
use App\Http\Requests\HomeUsersRequest;
use App\Http\Requests\PhoneRequest;
use Hash;
use Mail;
use DB;
use Redis;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示模板加载视图
        return view('home.register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeUsersRequest $request)
    {
        
        //开启事物
        DB::beginTransaction();
        //接收数据
        $data = $request->except('_token');
        //获取users表数据
        $users = Users::get();
        $arr =[];
        //取出账号
        foreach ($users as $k=>$v){
            $arr[]= $v->account;
        }
        //判断该邮箱是否已经注册
        if(in_array($data['email'],$arr)){
            dd('该邮箱已创建账号,请直接登录');
        }else{
            //创建一个新的模型
            $users = new Users;
            //将表单传过来的值赋值给模型
            $users->account = $data['email'];
            //将密码进行Hash加密
            $users->password = Hash::make($data['password']);
            //将密码加密后存至数据表users中
            $res1 = $users->save();
            //接收返回的id号
            $uid = $users->uid;
        }
       
        //创建一个新的模型
        $usersdetail = new UsersDetail;
        //使用户表与详情表通过外键关联
        $usersdetail->user_id = $uid;
        // 将表单传过来的值赋值给模型
        $usersdetail->email = $data['email'];
        //生成用户的秘钥
        $usersdetail->token =str_random(60);
        //提交存储数据
        $res2 = $usersdetail->save();

        //注册成功
        if($res1 && $res2){
            DB::commit();
            //发送邮件
            Mail::send('home.register.send',['token'=>$usersdetail->token,'id'=> $users->uid,'email' =>$data['email']],function($m) use($usersdetail) {
                 $m->to($usersdetail->email)->subject('你好呀!!');
            });
            return redirect('home/login')->with('success','注册成功');              
        }else{
            DB::rollBack();
            return back()->with('error','注册失败');
        }
    }

    /**
     * 改变状态码 给用户唯一签名
     * [change description]
     * @return [type] [description] 
     */
    public function changeStatus($id,$token)
    {
            
         // 通过外键查询获取数据  
        $users = UsersDetail::where('user_id','=',$id)->first();
        //判断用户是否存在
        if(!$users){
            dd('链接失效');
        }
        //判断秘钥是否正确
        if($users->token != $token){
            dd('链接失效');
        }
        //改变状态码
        $users->status = 1;
        //重新生成一个新的秘钥
        $users->token = str_random(60);
        if($users->save()){
            dd('激活成功');
        }else{
            dd('激活失败');
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
        //
    }

    /**
     * 加载手机注册api文件
     * @return [type] [description]
     */
    public function sendphone()
    {   
        //显示模板加载视图
        return view('home.register.sendPhone');
    }

    /**
     * 手机注册表单提交
     * @return [type] [description]
     */
    public function phone(PhoneRequest $request)
    {  

        //开启事物
        DB::beginTransaction(); 
        //接收数据 
        $data = $request->only(['phone','password','repassword','code']);
        //判断验证码不能为空
        if($data['code'] == ''){
            return back()->with('error','验证不能为空');
        }
        //获取redis验证码并进行判断
        $redis = new Redis;
        $redis->connect('localhost',6379);
        $code_phone = $redis->get('code_phone');
        if($request->code != $code_phone){
            return back()->with('error','验证码错误');
        }
        //获取数据
        $users = Users::get();
        $arr =[];
        foreach ($users as $k=>$v){
            $arr[]= $v->account;
        }
        //判断该手机号是否存在
        if(in_array($data['phone'],$arr)){
            return back()->with('error','该手机号已被注册,请直接登录');
        }else{
            //创建一个新的模型
            $users = new Users;
            //将表单传过来的值赋值给模型
            $users->account = $data['phone'];
            //将密码进行哈希加密
            $users->password = Hash::make($data['password']);
            //提交保存数据
            $res1 = $users->save();
            //获取用户表id
            $uid = $users->uid;
        }
        //创建一个新的模型
        $usersdetail = new UsersDetail;
        //通过外键将用户表与用户详情表进行关联
        $usersdetail->user_id = $uid;
        //将表单传过来的值赋值给模型
        $usersdetail->phone = $data['phone'];
        //提交保存数据
        $res2 = $usersdetail->save();
        //判断是否保存成功
        if($res1 && $res2){
            DB::commit();
            //改变状态码
            $usersdetail->status= 1;
            //提交保存数据
            $usersdetail->save();
            return redirect('/home/login')->with('success','注册成功');
        }else{
            DB::rollBack();
            return back()->with('error','注册失败');
        }
    }
}    
