<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class NodesController extends Controller
{

    // select n.cname,n.aname from nodes as n,user_role as ur,role_node as rn where ur.userid = 8 and ur.roleid = rn.roleid and rn.nodeid = n.nid;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $role_data = DB::table('roles')->OrderBy('rid','asc')->get();
        $node_data = DB::table('nodes')->OrderBy('nid','asc')->get();
        
        return view('admin.rbac.index',['role_data'=>$role_data,'node_data'=>$node_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.rbac.create');
    }


    public function nodeadd()
    {
        //
        return view('admin.rbac.nodeadd');
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
        $data = $request->except(['_token']);
        $res = DB::table('roles')->insert($data);
        if($res){
            return redirect('/admin/rbac/roles')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    public function insert(Request $request)
    {
        $data = $request->except(['_token']);
        $res = DB::table('nodes')->insert($data);
        if($res){
            return redirect('/admin/rbac/roles')->with('success','添加成功');
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
        //获取当前的角色
        $role = DB::table('roles')->where('rid',$id)->first();
        //获取当前角色的权限节点id
        $nids = DB::table('role_node')->where('roleid',$id)->select('nodeid')->get();
        $nid = [];
        foreach ($nids as $k => $v) {
            $nid[] = $v->nodeid;
        }
        //获取所有的权限节点
        $nodes = DB::table('nodes')->get();
        return view('admin.rbac.edit',['role'=>$role,'nodes'=>$nodes,'nid'=>$nid]);
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
        $nids = $request->input('nids');
        //删除记录
         DB::table('role_node')->where('roleid',$id)->delete();
         foreach ($nids as $k => $v) {
            $temp = [
                'roleid'=>$id,
                'nodeid'=>$v
             ];
            DB::table('role_node')->insert($temp);
         }
         return redirect('/admin/rbac/roles')->with('success','设置成功');
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
}
