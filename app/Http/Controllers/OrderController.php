<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $uid=Auth::guard()->user()->id;
        $uname=Auth::guard()->user()->name;
        //$orderdata=new \App\Models\Order();
        //$userData=\App\Models\User::where('id',$uid)->get();
        $orderData=Order::where('userId',$uid)->where('deleted_at',null)->paginate('3');
        //dd($orderData);
        return view('customer.viewOrders',compact('orderData'));
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
        //dd($request->all());
        $reqData=$request->except(['_token','btnparceladd']);
        $ordId=generate_order_id();
        //dd($reqData,$ordId);
        $order=new Order();
        $order->insert([
            'id'=>$ordId,
            'product'=>$request->ddlprod,
            'userId'=>$request->txtuser,
            'weight'=>$request->txtweight,
            'source_address'=>$request->txtsource,
            'destination_address'=>$request->txtdestination,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        //session()->flash('now','Order Created Successfully');
       return redirect()->route('orders.index')->with('success','Order Created Successfully');
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
        //echo $id;exit;
        $orderId=$id;
        $orderData=Order::where('id',$id)->get()->toArray();
        //dd($orderData);
        //return response()->json(['data'=>$orderData]);
        return view('customer.track_order',compact('orderData'));
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
        $ordid=$id;
        $order=Order::findOrfail($id);
        return view('customer.editOrder',compact('order'));
        //dd($order);

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
        $order=$id;
        $order=new Order();
        $order->updateOrInsert(['id'=>$id],['product'=>$request->ddlprod,'weight'=>$request->txtweight,'destination_address'=>$request->txtdestination,'source_address'=>$request->txtsource]);
        return redirect()->route('orders.index')->with('success','Record Updated');
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
        $orderId=$id;
        $order=Order::findOrfail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success','Record Deleted Success');
        //dd($order);
    }

}
