<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use DB;
use App\Models\Admins_users;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

          
        $count = $request->input('count','5');
        $search = $request->input('search');
        
        $data = Admins_users::where('auname','like','%'.$search.'%')->paginate($count);
        return view('admin.user.index',['data'=>$data,'request'=>$request->all(),'search'=>$search,'count'=>$count]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载  后台用户添加页面
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {   
        // dd($request->all());

        //接收数据
        $data = $request->except(['_token','respass']);
        
        $users = new Admins_users;
        $users->account = $data['account'];
        $users->password = Hash::make($data['password']);
        $users->auname = $data['auname'];
        $users->sex = $data['sex'];       
        $users->phone = $data['phone'];
        $users->email = $data['email'];
        $users->power = $data['power'];
        $res = $users->save();
    
        if($res){
            return redirect('/admin/user')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        $users = Admins_users::find($id);
        //显示模板加载视图
        return view('admin.user.edit',['users'=>$users]);
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
        $users = Admins_users::find($id);
        $users->auname = $request->input('auname','');
        $users->email = $request->input('email','');
        $users->phone = $request->input('phone','');
        $users->power = $request->input('power','');
        $users->sex =$request->input('sex','');
        $res = $users->save();
        if($res ==true ){
            return redirect('admin/user')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
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
        
        $res1 = Admins_users::destroy($id);
        if($res1 ==true){
           
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }
}
