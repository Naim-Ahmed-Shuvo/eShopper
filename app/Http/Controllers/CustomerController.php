<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
    public function customer_register(Request $request)
    {
        $customer_id = Customer::insertGetId([
            'name' => $request->customer_name,
            'email' => $request->customer_email,
            'phone' => $request->customer_phone,
            'password' => md5($request->customer_password),
        ]);

        Session::put('customer_id', $customer_id );
        Session::put('customer_name', $request->customer_name );

        return redirect('/checkout_page');
    }

    public function checkout_page()
    {
       return view('frontend.pages.checkout');
    }

    public function customer_logout()
    {
        Session::flush();
        return redirect('/');
    }

    public function customer_login(Request $request)
    {
        $email = $request->login_email;
        $password = md5($request->login_password);

        $result = DB::table('customers')
                  ->where('email', $email)
                  ->where('password', $password)
                  ->first();
        $customer_id = $result->id;
        if($result){
            Session::put('customer_id', $customer_id);
            return redirect('/checkout_page');
        } else{
            return redirect('/cart_checkout_login');
        }
    }

    public function view_product($id)
    {
        $view_order_info = DB::table('orders')
                        ->join('customers', 'orders.customer_id', '=', 'customers.id')
                        // ->select('customers.name')
                        ->join('order_details','order_details.order_id', '=', 'orders.id')
                        ->join('shippings', 'orders.shipping_id', '=', 'shippings.id')
                        ->select('orders.*', 'customers.*', 'order_details.*','shippings.*')
                        ->first();

        $ordered_products = DB::table('order_details')
                           ->join('products', 'order_details.product_id', '=', 'products.id')
                           ->select('products.name as product_name', 'products.price as product_price', 'order_details.*')
                           ->first();

        // print_r($view_order_info->customer_name) ;

        return view('backend.pages.order.view_order', compact('view_order_info', 'ordered_products'));
    }
}
