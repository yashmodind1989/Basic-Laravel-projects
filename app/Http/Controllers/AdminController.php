<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\agents;

class AdminController extends Controller
{
    //

    public function manage_users()
    {
          $users=User::where('role','<>','admin')->paginate('3');
          //dd($users);
          return view('admin.manageUsers',compact('users'));
    }
    public function enable_disable_user(Request $request,$id)
    {
         $user=User::findOrfail($id);
         if($user)
         {
            $status=$user->is_active;
            if($status=='1'){ $status= '0';} else{$status= '1';}
            //dd($status);
            $user->is_active=$status;
            $user->save();
         }
         //dd($user);
         return redirect()->route('manage_users')->with('success','Status Changed Success');
    }
    public function remove_user($id)
    {
        $user=User::find($id);
        //dd($user);
        $user->delete();
        return redirect()->route('manage_users')->with('success','User Removed Success');
    }
    public function viewDeletedUsrs()
    {
        $trashed=User::onlyTrashed()->get();
        //dd($trashed);
        return view('admin.trashedUsers',compact('trashed'));
    }
    public function restoreUser(Request $request,$id)
    {
        //dd($id);
        $restoreUser = User::withTrashed()->find($id);
        $restoreUser->restore();
        return redirect()->route('viewDeletedUsrs')->with('success', 'User restored successfully!');
    }
    public function assign_agent()
    {
        $orders=Order::where('status','pending')->where('deleted_at','=',null)->get();
        $customers=User::where('role','=','customer')->where('deleted_at','=',null)->get();
        $agents=User::where('role','=','deliveryAgent')->where('deleted_at','=',null)->get();
        return view('admin.assignAgent',compact(['orders','customers','agents']));
    }
    public function getCustomers(Request $request,$id)
    {
        $orders=Order::where('status','pending')->where('deleted_at','=',null)->get();
        $customers=User::where('role','=','customer')->where('deleted_at','=',null)->get();
        $agents=User::where('role','=','deliveryAgent')->where('deleted_at','=',null)->get();
        $ordersNew=Order::where('id',$id)->where('deleted_at','=',null)->get();
        return response()->json(['states'=>$ordersNew]);
    }
    public function add_agent(Request $request)
    {
         $validated=$request->validate([
              'ddlord' =>'required | string',
              'ddlcust' =>'required',
              'ddlagent'=>'required',
         ]);
         if($validated)
         {

            $reqData=$request->except('_token');
            $name=User::where('id',$reqData['ddlagent'])->first();
             //dd([$name->name,$reqData]);
             $agentsAssign=agents::insert([
                  'name' => $name->name,
                  'cust_id'=> $reqData['ddlcust'],
                  'order_id'=> $reqData['ddlord'],
                  'status'=>'pending',
                  'created_at'=>now()->format('Y-m-d H:i:s'),
             ]);
             return redirect()->route('manage_users')->with('success','Agent Assigned Success');
         }
    }
    public function manage_orders()
    {
        $order=Order::with('belongsToDeliveryagent')->paginate('10');
        // echo "<pre>";
        // print_r($order);
        // echo "</pre>";
        // exit;
        return view('admin.allOrders',compact('order'));
    }
    public function edit_order($id,Request $request)
    {

        $order=Order::with('belongsToDeliveryagent')->where('id',$id)->get();
        //echo "<pre>";
        //print_r($order);
        // exit;
        return view('admin.editOrder',compact('order'));
    }
    public function change_order($id,Request $request)
    {
         $order_id=$id;
         $data=$request->except('_token','_method','btnedit');
         $order=Order::find($order_id);
         $order->weight=$request->txtweight;
         $order->source_address=$request->txtsource;
         $order->destination_address=$request->txtdestination;
         $order->status=$request->ddlstatus;
         $order->save();
         $agents=agents::where('order_id',$order_id)->first();
         $agents->name=$request->ddlagent;
         $agents->save();
         //dd([$order,$agents]);
         return redirect()->route('manage_orders')->with('success','Data Changed Success');
    }
    public function delete_order($id,Request $request)
    {
        $order_id=$id;
        $order=Order::where('id',$order_id)->first();
        $order->delete();
        return redirect()->route('manage_orders')->with('success','Data Deleted Success');
    }
}
