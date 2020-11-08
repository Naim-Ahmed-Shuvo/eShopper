<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
class ProductController extends Controller
{
    public function view_products()
    {
        return view('backend.pages.product/view_products');
    }

    public function save_product(Request $request)
    {

       if($request->hasFile('image')){

           $get_img = $request->file('image');
           $img_name = time().'.'.$get_img->getClientOriginalExtension();
           Image::make($get_img)->save('product_img/'.$img_name, 100);

           Product::insert([
              'name' => $request->product_name,
              'category_id' => $request->category_id,
              'brand_id' => $request->brand_id,
              'short_description' => $request->short_description,
              'long_description' => $request->long_description,
              'price' => $request->price,
              'image' => 'product_img/'.$img_name,
              'size' => $request->size,
              'color' => $request->color,
              'publication_status' => 1,
           ]);

           return back()->with('success', 'Product saved successfully');
       }
    }

    public function de_active_product($id)
    {

       Product::find($id)->update([
           'publication_status' => 0,

       ]);

       return back()->with('success', 'Product Deactivated successfully');
    }
    public function active_product($id)
    {
       Product::find($id)->update([
           'publication_status' => 1,
       ]);
       return back()->with('success', 'Product activated successfully');
    }

    public function edit_product($id)
    {
        $product_info = Product::find($id)->first();
        return view('backend.pages.product/edit_product', compact('product_info'));
    }
    public function update_product(Request $request)
    {
        if ($request->image != null) {
            $product_info = Product::where('id', $request->product_id)->first();
            if ( $product_info->image != null ) {
                unlink($product_info->image);
            }

            // img processing
            $get_img =  $request->file('image');
            $img_name = time().'.'.$get_img->getClientOriginalExtension();
            Image::make($get_img)->save('product_img/'.$img_name,100);


            // slug
            // $without_space = str_replace("  ", "-", $request->name);
            // $without_SlashAndSpace = str_replace("/", "-", $without_space);
            // $slug = str_replace(".", "-", $without_SlashAndSpace);


             Product::where('id', $request->product_id)->update([

                'name' => $request->product_name,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'price' => $request->price,
                'image' => 'product_img/'.$img_name,
                'size' => $request->size,
                'color' => $request->color,
                'publication_status' => $request->publication_status,
                'updated_at' => Carbon::now(),

            ]);
            return redirect('/view_products')->with('success', 'Product Updated successfully');

        }
    }

    public function delete_product($id)
    {
        $info = Product::find($id);
        if($info->image != null){
            unlink($info->image);
        }

        Product::find($id)->delete();
        return redirect('/view_products')->with('success', 'Product deleted successfully');
    }
}


