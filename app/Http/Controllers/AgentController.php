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
}
