<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $quantity = $request->quantity;
        $product_id = $request->product_id;

        $cart_product = Product::find($product_id);

        $data['id'] = $cart_product->id;
        $data['qty'] = $quantity;
        $data['name'] = $cart_product->name;
        $data['price'] = $cart_product->price;
        $data['options']['image'] = $cart_product->image;

        Cart::add($data);


        return view('frontend.pages.cart');
    }

    public function show_cart_page()
    {
        return view('frontend.pages.cart');
    }

    public function delete_cart($id)
    {
       Cart::update($id, 0);
       return redirect('show_cart_page');
    }

    public function update_cart(Request $request)
    {
       $qty = $request->quantity;
       $rowId = $request->rowId;

       Cart::update($rowId, $qty);
       return redirect('show_cart_page');

    }
}
