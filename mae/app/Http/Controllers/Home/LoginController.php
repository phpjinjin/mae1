<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Hash;
use App\Models\UsersDetail;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示模板加载视图
        return view('home.login.index');
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
    public function store(Request $request)
    {   
        //接收数据
        $data = $request->only(['account','password']);
        //通过账户获取数据
        $user = users::where('account',$data['account'])->first();
        if($user){
            //获取用户表id
            $id = $user->uid;
            // 通过外键获取详情表数据
            $userdetails = UsersDetail::where('user_id',$id)->first();
            //获取用户状态
            $status = $userdetails->status;
           
            //判断用户是否完成激活
            if($status == 0){
            return redirect('/home/login')->with('error','未完成激活,请激活后再登录');
            } 
            //通过Hash比对 判断密码是否正确   
            if(Hash::check($data['password'],$user->password)){
            //存储session值
            session(['login'=>true,'id'=>$user->uid,'account'=>$data['account']]);
            // echo session(['login','id']);
            return redirect('/home/index')->with('success','登录成功');   
       } 
            return redirect('/home/login')->with('error','密码错误,请重新输入'); 

        } else {
            return redirect('/home/login')->with('error','账号错误,请重新输入');
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
     * 退出登录
     * @return [type] [description]
     */
    public function exit()
    {   
        //重新复制session值
        session(['login'=>null,'id'=>'','account'=>'']);
        return redirect('/home/index');
    }
}
