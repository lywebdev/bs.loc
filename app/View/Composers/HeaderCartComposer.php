<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class HeaderCartComposer
{
    public function compose(View $view)
    {
        $cartItems = collect(json_decode(Cookie::get('cart')));
        $totalCost = 0;
        foreach ($cartItems as $cartItem) {
            $totalCost += $cartItem->quantity * $cartItem->price;
        }

        $view->with('share_cartItems', $cartItems);
        $view->with('share_cartItemsTotalCost', $totalCost);
        $view->with('share_cartItemsCount', $cartItems->count());
    }
}
