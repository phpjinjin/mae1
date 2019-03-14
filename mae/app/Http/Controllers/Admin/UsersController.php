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
        //设置分页一页显示条数 ,默认五条
        $count = $request->input('count','5');
        //获取搜索内容
        $search = $request->input('search');
        //以用户名从数据表Users中查询数据并分页
        $data = Users::where('uname','like','%'.$search.'%')->paginate($count);
        //遍历这条数据
         foreach ($data as $k => $v) {
            //获取Users表的uid
            $id = $v->uid;
            //通过uid查询Usersdetail表中的数据
            $date = UsersDetail::where('user_id',$id)->get();
            //遍历取得的数据
           foreach ($date as $kk => $vv) {             
           }
        }
        //显示模板加载视图
         return view('admin.users.index',['vv'=>$vv,'data'=>$data,'request'=>$request->all(),'search'=>$search,'count'=>$count]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示模板加载视图
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
        //创建一个新的模型
        $users = new Users;
        //将表单传过来的值赋值给模型
        $users->account = $data['account'];
        $users->password = Hash::make($data['password']);
        $users->uname = $data['uname'];
        $users->pname = $data['pname'];
        $users->sex = $data['sex'];
        //保存提交数据
        $res1 = $users->save();
        //获取uid
        $uid = $users->uid;
        //创建一个新的模型
        $usersdetail = new UsersDetail;
        //通过外键关联Users表
        $usersdetail->user_id = $uid;
         //创建文件上传对象
        $file = $request->file('pic');
        // 获取文件后缀
        $ext = $file->extension();
        // 拼接名称
        $file_name = time()+mt_rand(1000565,6656556).'.'.$ext;  
         //执行上传
        $res = $file->storeAs('/users',$file_name);
        //将表单传过来的值赋值给模型
        $usersdetail->email = $data['email'];
        $usersdetail->phone = $data['phone'];
        $usersdetail->face = $file_name;
        //保存提交数据
        $res2 = $usersdetail->save();
        //判读是否存储成功
        if($res1 && $res2){
            DB::commit();
            //修改用户状态 激活
            $usersdetail->status = '1';
            //保存提交数据
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
        //通过id查询获取数据
        $users = Users::find($id);
        //通过外键获取详情表数据
        $usersdetail = UsersDetail::where('user_id',$id)->first();
        //显示模板加载视图
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
        //通过id查询获取数据
        $users = Users::find($id); 
        //将表单传过来的值赋值给模型       
        $users->pname = $request->input('puname','');
        $users->uname = $request->input('uname','');
        $users->sex =$request->input('sex','');
        //提交保存数据
        $res1 = $users->save();

        //通过外键查询获取数据
        $userd = UsersDetail::where('user_id',$id)->first();
        //将表单传过来的值赋值给模型
        $userd->phone = $request->input('phone','');
        $userd->email = $request->input('email',''); 
        $userd->face = $request->input('pic','');
        $res2 = $userd->save();
        //判读是否存储成功
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
        //判断是否操作成功  
        if($res1 && $res2){
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
             DB::rollBack();
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }
}
