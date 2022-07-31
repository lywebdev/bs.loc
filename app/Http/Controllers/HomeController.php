<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function home()
    {
        $latestProducts = Product::orderBy('id', 'desc')
            ->with(['photos' => function($photosQuery) {
                $photosQuery->limit(2);
            }])
            ->where('status', Product::STATUS_ACTIVE)
            ->limit(8)
            ->get();
        $latestPosts = Post::limit(6)->get();

//        $popularProductsInOrders = Order
//        $bestsellersProducts = Product::whereIn('id', )
//            ->get();

        return view('home', compact('latestProducts', 'latestPosts'));
    }
}
