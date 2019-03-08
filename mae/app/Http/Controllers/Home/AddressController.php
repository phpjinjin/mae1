<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data = Address::all();

        return view('home.address.index');
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
        //
        DB::beginTransaction();
        $address = new Address;
        // $collect->uid = $request->uid;

        $address->gid = $id;

        $res = $address->save();

        if($res){
            DB::commit();
            return back()->with('sccg','添加成功');
        }else{
            DB::rollBack();
            return back()->with('scerror','添加失败');
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
        // DB::beginTransaction();
        // $add = address::find($id);
        // $add->uid = $request->uid;
        // $add->aname = $request->aname;
        // $add->phone = $request->phone;
        // $add->adress = $request->adress;
        // $add->addres = $request->addres;
        // $add->code = $request->code;
        // $add->region = $request->region;
        // $res = $add->save();
        // if($res){
        //     DB::commit();
        //     return redirect('admin/address')->with('xgcg','成功');
        // }else{
        //     DB::rollBack();
        //     return back()->with('xgerror','失败');
        // }
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
