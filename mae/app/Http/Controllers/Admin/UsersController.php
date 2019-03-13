<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\Models\Users;
use App\Models\UsersDetail;
use DB;
use Hash;
class UsersController extends Controller
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
        
        $data = Users::where('uname','like','%'.$search.'%')->paginate($count);

         foreach ($data as $k => $v) {
            $id = $v->uid;
            $date = UsersDetail::where('user_id',$id)->get();
           foreach ($date as $kk => $vv) {             
           }
        }

        // $res = Users::all();
        // foreach ($res as $kk => $vv) {
        //     dump($v->uname);
        // }['data'=>data]
        // return view('admin.user.index',['data'=>$data,'request'=>$request->all(),'search'=>$search,'count'=>$count]);
         return view('admin.users.index',['vv'=>$vv,'data'=>$data,'request'=>$request->all(),'search'=>$search,'count'=>$count]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {   
        //开启事物
        DB::beginTransaction();
        //
        //接收数据
        $data = $request->except(['_token','repassword']);
        //
        $users = new Users;
        $users->account = $data['account'];
        $users->password = Hash::make($data['password']);
        $users->uname = $data['uname'];
        $users->pname = $data['pname'];
        $users->sex = $data['sex'];
        $res1 = $users->save();
        $uid = $users->uid;

        $usersdetail = new UsersDetail;
        $usersdetail->user_id = $uid;
         //创建文件上传对象
        $file = $request->file('pic');
        // 获取文件后缀
        $ext = $file->extension();
        // 拼接名称
        $file_name = time()+mt_rand(1000565,6656556).'.'.$ext;  
         //执行上传
        $res = $file->storeAs('/users',$file_name);
        $usersdetail->email = $data['email'];
        $usersdetail->phone = $data['phone'];
        $usersdetail->face = $file_name;
        $res2 = $usersdetail->save();

        if($res1 && $res2){
            DB::commit();
            $usersdetail->status = '1';
            $usersdetail->save();
            return redirect('admin/users')->with('success','添加成功');
        }else{
            DB::rollBack();
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
        $users = Users::find($id);
        $usersdetail = UsersDetail::where('user_id',$id)->first();
        return view('admin.users.edit',['users'=>$users,'userd'=>$usersdetail]);
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
        //开启事物
        DB::beginTransaction();

        $users = Users::find($id);        
        $users->pname = $request->input('puname','');
        $users->uname = $request->input('uname','');
        $users->sex =$request->input('sex','');
        $res1 = $users->save();


        $userd = UsersDetail::where('user_id',$id)->first();
        $userd->phone = $request->input('phone','');
        $userd->email = $request->input('email',''); 
        $userd->face = $request->input('pic','');
        $res2 = $userd->save();
        if($res1 && $res2){
            DB::commit();
            return redirect('admin/user')->with('success','修改成功');
        }else{
             DB::rollBack();
            return back()->with('error','修改失败');
        }
        // dump($userd);
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
        //开启事物
        DB::beginTransaction();
        //删除用户表
        $res1 = Users::destroy($id);
        //删除用户详情表
        $res2 = UsersDetail::where('user_id',$id)->delete();    
        if($res1 && $res2){
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
             DB::rollBack();
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }
}
