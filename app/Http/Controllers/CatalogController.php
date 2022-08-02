<?php

namespace App\Http\Controllers;

use App\Models\Category\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CatalogController extends Controller
{
    private $filtersSettings;

    private const FILTER_PRICE = 'price_filter';


    protected function sort(Request $request, $products)
    {
        $filtersSettings = [];

        // Фильтр поиска
        if ($request->filled('search')) {
            $products->whereIn('id',
                Product::orWhere('name', 'LIKE', "%{$request->search}%")
                    ->orWhere('vendor_code', 'LIKE', "%{$request->search}%")
                    ->get()
                    ->pluck('id')
            );
        }

        $minPrice = $products->min('price') ?? 0;
        $maxPrice = $products->max('price') ?? 0;
        $filtersSettings[self::FILTER_PRICE] = [
            'min' => $minPrice,
            'max' => $maxPrice,
            'selected_min' => $minPrice,
            'selected_max' => $maxPrice
        ];

        // Фильтр стоимости
        if ($request->filled(self::FILTER_PRICE)) {
            $values = explode(';', $request->{self::FILTER_PRICE});
            $min = $values[0];
            $max = $values[1];

            $products->where('price', '>=', $min);
            $products->where('price', '<=', $max);

            $filtersSettings[self::FILTER_PRICE]['selected_min'] = $min;
            $filtersSettings[self::FILTER_PRICE]['selected_max'] = $max;
        }


        $this->filtersSettings = $filtersSettings;
    }

    public function index(Request $request)
    {
        $categories = Category::with(['products' => function($productsQuery) {
            $productsQuery->select('id', 'category_id');
            $productsQuery->count();
        }])->get();
        $products = Product::orderBy('id', 'desc')
            ->with('photos');

        $this->sort($request, $products);
        $products = $products->paginate(12)->withQueryString();

        return view('sections.shop.catalog.catalog', [
            'products' => $products,
            'categories' => $categories,
            'filterSettings' => $this->filtersSettings
        ]);
    }

    public function product(string $slug)
    {
        $cartItems = collect(json_decode(Cookie::get('cart')));
        $product = Product::with('photos')->where('slug', $slug)->first();
        if (!$product) {
            abort(404, 'Товар по указанному адресу не найден');
        }

        $product->cartItem = $cartItems->where('product_id', $product->id)->first();

        return view('sections.shop.product.product', compact('product'));
    }

    public function productBySku(string $sku)
    {
        $cartItems = collect(json_decode(Cookie::get('cart')));
        $product = Product::with('photos')->where('vendor_code', $sku)->first();
        if (!$product) {
            abort(404, 'Товар по указанному артикулу не найден');
        }

        $product->cartItem = $cartItems->where('product_id', $product->id)->first();

        return view('sections.shop.product.product', compact('product'));
    }


    public function category(string $categorySlug, Request $request)
    {
        $category = Category::where('slug', $categorySlug)->first();
        if (is_null($category)) {
            abort(404);
        }

        $categories = Category::with(['products' => function($productsQuery) {
            $productsQuery->select('id', 'category_id');
            $productsQuery->count();
        }])->get();


        $products = Product::orderBy('id', 'desc')
            ->where('category_id', $category->id)
            ->with('photos');

        $this->sort($request, $products);
        $products = $products->paginate(12)->withQueryString();

        return view('sections.shop.catalog.catalog', [
            'products' => $products,
            'categories' => $categories,
            'filterSettings' => $this->filtersSettings
        ]);
    }
}
