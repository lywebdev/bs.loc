<?php

namespace App\View\Composers;

use App\Models\Category\Category;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class HeaderComposer
{
    public function compose(View $view)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $cartItems = collect(json_decode(Cookie::get('cart')));
        $totalCost = 0;
        foreach ($cartItems as $cartItem) {
            $totalCost += $cartItem->quantity * $cartItem->price;
        }

        $view->with('share_cartItems', $cartItems);
        $view->with('share_cartItemsTotalCost', $totalCost);
        $view->with('share_cartItemsCount', $cartItems->count());
        $view->with('share_categories', $categories);
    }
}
