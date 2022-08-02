<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = collect(json_decode(Cookie::get('cart')));
        $totalCost = 0;

        foreach ($cartItems as $cartItem) {
            $cartItem->product = Product::where('id', $cartItem->product_id)->first();
            $totalCost += $cartItem->quantity * $cartItem->product->price;
        }
        // Проверить наличие всех товаров

        return view('sections.shop.cart.cart', compact('cartItems', 'totalCost'));
    }
}
