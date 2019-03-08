<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\Goods;
use App\Models\GoodsPic;
class OrdersController extends Controller
{
    /**
     *浏览订单页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //默认一页显示两条数据
        $res = $request->input('count','1');
        $res1 = Orders::count();

   
        
        //获取请求的参数
        $search = $request->input('search','');        
        //条件分页
        $data = Orders::where('oid','like','%'. $search.'%')->paginate($res);
         //加载广告模版分配数据
        return view('admin.orders.index',['data'=>$data,'request'=>$request->all(),'res1'=>$res1]);

        
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
        //
    }

    /**
     *订单详情
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //找到订单详情对应订单主表传过来的id
        $ordersdetail = OrdersDetail::where('oid','=',$id)->get();
        return view('admin.orders.show',['ordersdetail'=>$ordersdetail]);
        
    }



    /**
     * 加载修改的页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //加载修改视图
        $data = Orders::find($id);
        return view('admin.orders.edit',['data'=>$data]); 
        
    }

    /**
     * 执行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //通过表单传过来的id找到指定内容
            $orders = Orders::find($id);
            $orders->uname = $request->input('uname','');
             $orders->addres = $request->input('addres','');
             $orders->message = $request->input('message','');
             $res1 = $orders->save();
              if($res1){

                return redirect('admin/orders' )->with('success','修改成功');
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
        
        
        
    }


 /**
     *
     *发货
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orderr($id)
    {
        //找到指定表单传过来的id值
        $data =  Orders::find($id);
        //判断表单传过来的id值找到指定的字段判断然后执行
        if($data['status'] == 2){
            $data->status = 3;
            $res1 = $data->save();
            if($res1){
                 return redirect('admin/orders ')->with('success','已发货');
            }else{

                return back()->with('error','发货失败');
            }
           

        }
        
        
    }
     /**
     * 删除操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $res = Orders::find($id);
     
        $orders = Orders::destroy($id);
     
        $ordersdetail = OrdersDetail::destroy($res->ordersdetail->oid);
     
        if($orders && $ordersdetail){
        	echo '1';
        }else{
        	echo '0';
        }
        
    }



}
