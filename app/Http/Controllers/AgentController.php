<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\agents;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    //
    public function viewOrders(Request $request)
    {
        $loggedInAgentId=Auth::guard()->user()->id;
        //dd($loggedInAgentId);
        $loggedInAgentname=Auth::guard()->user()->name;
        //dd($loggedInAgentname);
       $orderData=Order::with('belongsToDeliveryagent')->get();

       $data = agents::join('parcels', 'agents.order_id', '=', 'parcels.id')
                ->join('users','users.id','=','parcels.userId')
                ->where('agents.name',$loggedInAgentname)
                ->select('*')
                ->get();
                //echo "<pre>";
                //print_r($posts);

       return view('agent.viewOrders',compact('data'));
    }
    public function change_status($id,Request $request)
    {
        //dd($id);
        $order=Order::findOrfail($id);
        $status=$order->status;
        return view('agent.updateStatus',['orderStatus'=>$status,'orderId'=>$id]);
    }
    public function updateStatus($id,Request $request)
    {
        $orderId=$id;
        //dd($request->all());
        $data=$request->except(['_token','_method','btnmodify']);
        $state=$data['ddlstate'];
        //dd($state);
        $updateOrder=Order::where('id',$orderId)->update([
            'status'=>$state
        ]);
        $updateAgents=agents::where('order_id',$id)->update([
            'status'=>$state
        ]);
        return redirect()->route('viewOrders')->with('success','Data Changed Successfully');
    }
    public function remove_order($id,Request $request)
    {
         $orderId=$id;
         $deleteOrder=Order::where('id',$id)->delete();
         $deleteAgent=agents::where('id',$id)->delete();
         return redirect()->route('viewOrders')->with('success','Data Removed Successfully');
    }
}
