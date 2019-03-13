<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Address;
use App\Models\Users;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //通过session获取当前登录用户的id
        $account = session('account');
        $user = Users::where('account',$account)->get();
        $id = $user[0]->uid;
        //获取当前用户在数据库中的记录
        $data = Address::where('uid',$id)->orderByRaw('status ASC')->paginate(2);
        return view('home.address.index',['data'=>$data,'res'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('home.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //判断是否登录
        if(session('login')){
            //获取当前登录用户的信息
            $account = session('account');
            $user = Users::where('account',$account)->get();

            //获取表单提交的数据
            DB::beginTransaction();
            $address = new Address;
            $address->aname = $request->aname;
            $address->phone = $request->phone;
            $address->addres = $request->addres;
            $address->status = $request->status;
            $address->code = $request->code;
            $address->region = $request->region;

            //设置地址表里的用户id为当前登录用户的id
            $address->uid = $user[0]->uid;


            //如果当前填入的地址为默认地址
            if($address->status == 1){
                //判断当前登录用户是否已经有默认地址
                $moren = Address::where('uid',$address->uid)->where('status','1')->first();
                //如果有,将其设置为非默认
                if(!empty($moren->status)){
                    $moren->status = 2;
                    $res = $moren->save();
                }
            }
    
            $res = $address->save();
    
            if($res){
                DB::commit();
                return redirect('/home/address')->with('tianjia','sasa');
            }else{
                DB::rollBack();
                return back()->with('tjerror','123');
                }
        }else{
            return back();
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
        $data = Address::find($id);
        return view('home.address.edit',['data'=>$data]);
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
        $account = session('account');
        $user = Users::where('account',$account)->get();
        DB::beginTransaction();
        $add = address::find($id);
        $add->uid = $request->uid;
        $add->aname = $request->aname;
        $add->phone = $request->phone;
        $add->addres = $request->addres;
        $add->status = $request->status;
        $add->code = $request->code;
        $add->region = $request->region;
        $add->uid = $user[0]->uid;
        $res = $add->save();
        if($res){
            DB::commit();
            return redirect('home/address')->with('xgcg','成功');
        }else{
            DB::rollBack();
            return back()->with('xgerror','失败');
        }
        // echo '1234';
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $del = Address::destroy($id);

        //判断是否正常
        if($del){
            echo "删除成功";
        }else{
           //异常弹回
            echo "删除失败";
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function moren($id)
    {
        //判断是否已经存在默认地址
        $moren = Address::where('status','1')->first();
        // dump($moren);
        DB::beginTransaction();
        if(!empty($moren->status)){
            //如果已经有默认地址,将原本的默认地址改为非默认
            $moren->status = 2;
            $res = $moren->save();
        }

        //将当前选择的地址改为默认地址
        $new = Address::where('addid',$id)->first();
        // dump($new);
        $new->status = 1;
        $res1 = $new->save();
        if($res1){
            DB::commit();
            return back()->with('szcg','设置成功');
        }else{
            DB::rollBack();
            return back()->with('mrerror','设置失败');
        }
    }
}
