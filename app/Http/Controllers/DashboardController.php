<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller

{

    public function dashboard()
    {
        $role = Auth::user()->role;
        $user_name = Auth::user()->name;
        if ($role == '1')
        {

            $categories = Category::all();
            $total_categories = count($categories);

            $items = Item::all();
            $total_items = count($items);

            $orders = Order::all();
            $total_orders = $orders->count();
            $pending_orders = $orders->where('status', 0)->count();
            $completed_orders = $orders->where('status', 1)->count();
            $canceled_orders = $orders->where('status', 2)->count();

            $users = User::all();
            $total_users = count($users);

            return view('admin.dashboard.dashboard',compact('user_name'), [
            'categories' => $categories,
            'total_categories' => $total_categories,
            'items' => $items,
            'total_items' => $total_items,
            'orders' => $orders,
            'total_orders' => $total_orders,
            'pending_orders' => $pending_orders,
            'completed_orders' => $completed_orders,
            'canceled_orders' => $canceled_orders,
            'users' => $users,
            'total_users' => $total_users,
            ]);
        }
        elseif($role == '0')
        {
            return view('auth.login',compact('user_name'));
        }
    }

    /**
     * Display a listing of the resource.
     */

}
