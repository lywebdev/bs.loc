<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function mainSlider()
    {
        return view('admin.pages.home.slider');
    }

    public function mainSliderStore(Request $request)
    {

    }
}
