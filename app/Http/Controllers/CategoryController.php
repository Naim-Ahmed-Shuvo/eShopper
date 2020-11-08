<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function all_category()
    {
        $categories = Category::all();
       return view('backend.pages.category.all_category', compact('categories'));
    }
    public function add_category()
    {
        return view('backend.pages.category.add_category');
    }

    public function save_category(Request $request){

        Category::insert([
            'name' => $request->category_name,
            'description' => $request->desription,
            'publication_status' => $request->publication_status,
            'created_at' => Carbon::now(),
        ]);
        // Session::put('message', 'Category added succesfully');
        return redirect('/all_category')->with('success', 'Category added succesfully');
    }

    public function de_active_category($id)
    {
        Category::where('id', $id)->update([
            'publication_status' => 0,
        ]);
            return back()->with('success', 'Category DeActivated successfully');


    }


    public function active_category($id)
    {
        Category::where('id', $id)->update([
            'publication_status' => 1,
        ]);
        return back()->with('success', 'Category Activated successfully');
    }

    public function edit_category($id)
    {
       $category = Category::where('id', $id)->first();
       return view('backend.pages.category.edit_category', compact('category'));
    }

    public function update_category(Request $request)
    {
       Category::where('id', $request->category_id)->update([
        'name' => $request->category_name,
        'description' => $request->desription,
        'publication_status' => $request->publication_status,
        'updated_at' => Carbon::now(),
       ]);

       return redirect('/all_category')->with('success', 'Category updated succesfully');
    }

    public function delete_category($id)
    {
       Category::find($id)->delete();
       return redirect('/all_category')->with('success', 'Category deleted succesfully');
    }
}
