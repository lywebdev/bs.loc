<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = collect(json_decode(Cookie::get('cart')));
        // Проверить наличие всех товаров

        return view('sections.shop.cart.cart', compact('cartItems'));
    }
}
