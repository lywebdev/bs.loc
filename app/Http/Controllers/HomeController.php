<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $latestProducts = Product::orderBy('id', 'desc')
            ->with(['photos' => function($photosQuery) {
                $photosQuery->limit(2);
            }])
            ->limit(8)
            ->get();

        return view('home', compact('latestProducts'));
    }
}
