<?php

namespace App\Http\Controllers;

use App\Models\Category\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::with(['products' => function($productsQuery) {
            $productsQuery->select('id', 'category_id');
            $productsQuery->count();
        }])->get();
        $products = Product::orderBy('id', 'desc')
            ->with('photos')
            ->paginate(12);

        return view('sections.shop.catalog.catalog', compact('products', 'categories'));
    }

    public function product(string $slug)
    {
        $product = Product::with('photos')->where('slug', $slug)->first();
        if (!$product) {
            abort(404, 'Товар по указанному адресу не найден');
        }

        return view('sections.shop.product.product', compact('product'));
    }

    public function productBySku($sku)
    {
        $product = Product::with('photos')->where('vendor_code', $sku)->first();
        if (!$product) {
            abort(404, 'Товар по указанному артикулу не найден');
        }

        return view('sections.shop.product.product', compact('product'));
    }
}
