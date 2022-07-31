<?php

namespace App\Http\Controllers;

use App\Models\Attribute\Attribute;
use App\Models\Attribute\CategoryLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TestController extends Controller
{
    public function index()
    {
        $cartItems = json_decode(Cookie::get('cart'));

        return view('test', compact('cartItems'));
    }
}
