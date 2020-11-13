<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Session;

class ShippingController extends Controller
{
    public function save_shipping_details(Request $request)
    {
         $shipping_id = Shipping::insertGetId([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'city' => $request->city,
         ]);

         Session::put('shipping_id',  $shipping_id);
         return redirect('/payment_page');
    }

    public function payment_page()
    {
        return view('frontend.pages.payment_page');
    }

    public function order_place(Request $request)
    {
        $payment_gateway = $request->payment_gateway;
        $shipping_id = Session::get('shipping_id');
        $customer_id = Session::get('customer_id');

        $payment_id = Payment::insertGetId([
            'payment_method' => $payment_gateway,
            'payment_status' => 'pending',
        ]);

        $order_id = Order::insertGetId([
            'customer_id' => $customer_id,
            'shipping_id' => $shipping_id,
            'payment_id' => $payment_id,
            'order_total' => Cart::total(),
            'status' => 'pending',
        ]);

        $contents = Cart::content();

        foreach ($contents as  $value) {
            OrderDetails::insert([
                'order_id' => $order_id ,
                'product_id' => $value->id,
                'product_name' => $value->name,
                'product_price' => $value->price,
                'product_sales_quantity' => $value->qty,
            ]);
        }

        if($payment_gateway == 'hand_cash'){
            Cart::destroy();
            return view('frontend.pages.handcash');

        }

        elseif ($payment_gateway == 'paypal') {
            echo 'paypal';
        }
        elseif ($payment_gateway == 'bkash') {
            echo 'bkash';
        }
        elseif ($payment_gateway == 'pyza') {
            echo 'pyza';
        }


        // echo $contents;
    }
}
