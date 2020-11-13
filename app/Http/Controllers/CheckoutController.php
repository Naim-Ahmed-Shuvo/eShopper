<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function cart_checkout_login()
    {
        return view('frontend.pages.checkout_login');
    }
}
