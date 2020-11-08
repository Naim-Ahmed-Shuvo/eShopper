<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function view_sliders()
    {
        return view('backend.pages.slider/view_sliders');
    }
}
