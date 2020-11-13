<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Image;
class SliderController extends Controller
{
    public function view_sliders()
    {
        return view('backend.pages.slider/view_sliders');
    }

    public function save_slider(Request $request)
    {
        if($request->image != null){
            $get_img = $request->file('image');
            $img_name = time().'.'.$get_img->getClientOriginalExtension();
            Image::make($get_img)->save('slider_img/'.$img_name, 100);

            Slider::insert([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => 'slider_img/'.$img_name,
                'publication_status' => $request->publication_status,
            ]);

            return back()->with('success', 'Slider Saved Successfully');
        }
    }

    public function edit_sider($id)
    {
        $slider = Slider::find($id);
        return view('backend.pages.slider.edit_sider', compact('slider'));
    }

    public function update_slider(Request $request)
    {
       if($request->image != null){
           $slider = Slider::find($request->slider_id);
           if($slider->image != null){
               unlink($slider->image);
           }

            // img processing
            $get_img =  $request->file('image');
            $img_name = time().'.'.$get_img->getClientOriginalExtension();
            Image::make($get_img)->save('slider_img/'.$img_name,100);

            Slider::where('id', $request->slider_id)->update([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => 'slider_img/'.$img_name,
                'publication_status' => $request->publication_status,
            ]);

            return redirect('/view_sliders')->with('success', 'Slider Updated successfully');
       }
    }

    public function delete_sider($id)
    {
        $slider = Slider::find($id);
        if($slider->image != null){
            unlink($slider->image);
        }

        Slider::find($id)->delete();
        return redirect('/view_sliders')->with('success', 'Slider Deleted successfully');
    }

    public function de_active_sider($id)
    {
        Slider::find($id)->update([
            'publication_status' => 0,
        ]);
        return back()->with('success', 'Slider Deactivated Successfully');
    }

    public function active_sider($id){
        Slider::find($id)->update([
            'publication_status' => 1,
        ]);
        return back()->with('success', 'Slider Activated Successfully');
    }
}
