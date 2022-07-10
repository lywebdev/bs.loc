<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(50);

        return view('admin.sections.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.sections.products.create');
    }

//    public function store(Request $request)
//    {
//        $requestCategory = $request->get('category');
//        Category::new($requestCategory['name']);
//
//        return redirect()->route('admin.categories.index')->with('success', 'Категория добавлена');
//    }

    public function edit(Product $product)
    {
        return view('admin.sections.products.edit', [
            'product' => $product
        ]);
    }
}
