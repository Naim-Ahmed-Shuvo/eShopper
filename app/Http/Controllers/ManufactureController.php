<?php

namespace App\Http\Controllers;

use App\Manufacture;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
   public function view_brands()
   {
       return view('backend.pages.brand.view_brands');
   }

   public function save_brands(Request $request)
   {
       Manufacture::insert([
           'name' => $request->brands_name,
           'category_id' => $request->category_id,
           'description' => $request->brand_description,
           'publication_status' => $request->publication_status,
           'created_at' => Carbon::now(),
       ]);

       return back()->with('success', 'Brand saved succesfully');
   }

   public function edit_brand($id)
   {
      $brand = Manufacture::where('id', $id)->first();
      return view('backend.pages.brand.edit_brand', compact('brand'));
   }

   public function update_brands(Request $request)
   {
    //    echo $request->brand_id;
    //    exit();
       Manufacture::find($request->brand_id)->update([
        'name' => $request->brands_name,
        'category_id' => $request->category_id,
        'description' => $request->brand_description,
        'publication_status' => $request->publication_status,
        'updated_at' => Carbon::now(),
       ]);

       return redirect('/view_brands')->with('success', 'Brand updated succesfully');
   }

   public function delete_brand($id)
   {
       Manufacture::find($id)->delete();
       return back()->with('success', 'Brand deleted succesfully');
   }

   public function de_active_brand($id)
   {
    Manufacture::where('id', $id)->update([
        'publication_status' => 0,
    ]);
        return back()->with('success', 'Brand DeActivated successfully');
   }
   public function active_brand($id)
   {
      Manufacture::find($id)->update([
           'publication_status' => 1,
      ]);

      return back()->with('success', 'Brand activated succesfully');
   }
}
