<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admins_users;
use Hash;
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
        return view('admin.login.index');
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
        $data = $request->except('_token');
        //通过账号查询数据
        $user = Admins_users::where('account',$data['account'])->first();
        //判断该账号是否存在
        if(!$user){           
            return redirect('/admin/login')->with('error','账号错误,请重新输入');
            }   
        if(Hash::check($data['password'],$user->password)){
            //存储一个登陆的session值
            session(['alogin'=>true,'id'=>$user->aid]);
            return redirect('/admin')->with('success','登录成功');   
       } 
            return redirect('/admin/login')->with('error','密码错误,请重新输入');  
        
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
    {   //重新赋值session值
        session(['login'=>null,'id'=>'']);
        return redirect('/admin/login');
    }
}
