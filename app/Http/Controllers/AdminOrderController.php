<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminOrderController extends Controller
{
    public function manage()
    {
        return view('admin.order.manage', [
            'orders' => Order::orderBy('id', 'desc')->get(),
        ]);
    }
    public function completed()
    {
        return view('admin.order.orders.completed', [
            'orders' => Order::orderBy('id', 'desc')->get(),
        ]);
    }
    public function canceled()
    {
        return view('admin.order.orders.canceled', [
            'orders' => Order::orderBy('id', 'desc')->get(),
        ]);
    }

    public function detail($id)
    {
        $decryptID = Crypt::decryptString($id);

        return view('admin.order.detail', [
            'order' => Order::find($decryptID),
        ]);
    }

    public function invoice($id)
    {
        return view('admin.order.invoice',[
            'order' => Order::find($id),
        ]);
    }

    public function orderStatus($id)
    {
        $getStatus = Order::select('status')->where('id',$id)->first();
        if($getStatus->status == 0)
        {
            $status = 1;
        }
        elseif($getStatus->status == 1)
        {
            $status = 2;
        }
        elseif($getStatus->status == 2)
        {
            $status = 0;
        }
        Order::where('id',$id)->update(['status'=>$status]);
        return back()->with('message','Order status changed successfully.');
    }

    public function delete($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect('/admin/order/manage')->with('error', 'Order not found.');
        }

        $order->delete();

        return redirect('/admin/order/manage')->with('message', 'Your Order delete successfully');
    }

}
