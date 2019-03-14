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
        //
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

        $users = Users::get();
        $arr =[];
        foreach ($users as $k=>$v){
            $arr[]= $v->account;
        }
        if(in_array($data['email'],$arr)){
            dd('该邮箱已创建账号,请直接登录');
        }else{
            $users = new Users;
            $users->account = $data['email'];
            $users->password = Hash::make($data['password']);
            //将密码加密后存至数据表users中
            $res1 = $users->save();
            //接收返回的id号
            $uid = $users->uid;
        }
       
        
        $usersdetail = new UsersDetail;
        $usersdetail->user_id = $uid;
        $usersdetail->email = $data['email'];
        $usersdetail->token =str_random(60);
        $res2 = $usersdetail->save();

        //注册成功
        if($res1 && $res2){
            DB::commit();
            //
            // return redirect('admin/users')->with('success','添加成功');
            // $title = 'zhuce';
            Mail::send('home.register.send',['token'=>$usersdetail->token,'id'=> $users->uid,'email' =>$data['email']],function($m) use($usersdetail) {
                 $m->to($usersdetail->email)->subject('你好呀');
                dd('注册成功,请尽快完成激活');                
            });
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
    public function changeStatus($id,$token){
        
        $users = UsersDetail::where('user_id','=',$id)->first();
        if(!$users){
            dd('链接失效');
        }
        if($users->token != $token){
            dd('链接失效');
        }
        $users->status = 1;
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
        $users = Users::get();
        $arr =[];
        foreach ($users as $k=>$v){
            $arr[]= $v->account;
        }
        if(in_array($data['phone'],$arr)){
            return back()->with('error','该手机号已被注册,请直接登录');
        }else{
            $users = new Users;
            $users->account = $data['phone'];
            $users->password = Hash::make($data['password']);
            $res1 = $users->save();
            $uid = $users->uid;
        }
        $usersdetail = new UsersDetail;
        $usersdetail->user_id = $uid;
        $usersdetail->phone = $data['phone'];
        $res2 = $usersdetail->save();
        if($res1 && $res2){
            DB::commit();
            $usersdetail->status= 1;
            $usersdetail->save();
            return redirect('/home/login')->with('success','注册成功');
        }else{
            DB::rollBack();
            return back()->with('error','注册失败');
        }
    }
}    
