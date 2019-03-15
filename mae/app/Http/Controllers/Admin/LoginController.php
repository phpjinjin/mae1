<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admins_users;
use Hash;
use DB;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = $request->except('_token');
        $user = Admins_users::where('account',$data['account'])->first();
        
        if(!$user){           
            return redirect('/admin/login')->with('error','账号错误,请重新输入');
            }   
        if(!Hash::check($data['password'],$user->password)){
            return redirect('/admin/login')->with('error','密码错误,请重新输入');  
        }

        //获取当前的权限
        $admin_nodes = DB::select('select n.cname,n.aname from nodes as n,user_role as ur,role_node as rn where ur.userid = '.$user->aid.' and ur.roleid = rn.roleid and rn.nodeid = n.nid');
        $arr = [];
        foreach($admin_nodes as $k => $v){
            $arr[$v->cname][] = $v->aname;
            if($v->aname == 'create'){
                $arr[$v->cname][] = 'store';
            }
            if($v->aname == 'edit'){
                $arr[$v->cname][] = 'update';
            }
        }
        //赋值后台首页
        $arr['IndexController'][] = 'index';
        //将获取到的权限 压入到session
        session(['admin_nodes_type'=>$arr]);

        session(['alogin'=>true,'id'=>$user->aid]);
        return redirect('/admin')->with('success','登录成功');
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
        session(['login'=>null,'id'=>'']);
        return redirect('/admin/login');
    }
}
