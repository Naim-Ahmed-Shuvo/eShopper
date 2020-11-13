<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order_management()
    {
        $all_orders = DB::table('orders')
                    ->join('customers', 'orders.customer_id', '=', 'customers.id')
                    ->select('orders.*', 'customers.name as customer_name')
                    ->get();
        return view('backend.pages.order/order_management', compact('all_orders'));
    }
}
