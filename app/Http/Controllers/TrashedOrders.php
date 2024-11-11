<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TrashedOrders extends Controller
{
    //
    public function viewTrashed(Request $request)
    {
         $trashed=Order::onlyTrashed()->get();
         //dd($trashed);

         return view('customer.trashedOrders',compact('trashed'));
    }
    public function restoreOrder(Request $request,$id)
    {
        //dd($id);
        $restoreOrder = \App\Models\Order::withTrashed()->find($id);
        $restoreOrder->restore();
        return redirect()->route('viewTrashed')->with('success', 'Order restored successfully!');
    }
}
