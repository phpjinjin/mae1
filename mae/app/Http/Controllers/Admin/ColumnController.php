<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Column;
class ColumnController extends Controller
{
    /**
     * 静态全局分配
     *
     * @return \Illuminate\Http\Response
     */
    public static function getColumn()
    {
        $column = Column::get();
        return $column;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request->input('count',5);
        $search = $request->input('search','');
        $tiao = Column::count();

         $data = Column::where('title','like','%'. $search.'%')->paginate($count);
        return view('admin.column.index',['column'=>$data,'request'=>$request->all(),'tiao'=>$tiao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.column.create');
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
        $data = $request->except(['_token']);
        //存储
        $res = Column::insert($data);

        if($res){
            return redirect('/admin/column')->with('success','添加成功');
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
        $column = Column::where('id',$id)->first();
        return view('admin.column.edit',['column'=>$column]);
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
        $data = $request->all();
        $column = Column::find($id);
        $column->title = $data['title'];
        $column->url = $data['url'];
        $column->sort = $data['sort'];
        
        if($column->save()){
            return redirect('/admin/column')->with('success','修改成功');
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
        //执行删除
        if(Column::destroy($id)){
            return redirect('/admin/column')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
