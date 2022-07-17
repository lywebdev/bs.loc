<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Services\MediaService\MediaService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->products_search;

        $products = Product::whereIn('id', Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('vendor_code', 'LIKE', "%{$query}%")
            ->orderBy('name', 'desc')
            ->pluck('id')
            )->with('category')
            ->orderBy('id', 'desc');
        $products = $products->paginate(50)->withQueryString();

        return view('admin.sections.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.sections.products.create');
    }

    public function store(Request $request)
    {
        $requestProduct = $request->get('product');
        $requestPhotos = $request->get('files'); // blobs

        $createdProduct = Product::new(
            $requestProduct['name'],
            $requestProduct['price'],
            $requestProduct['old_price'] ?? null,
            $requestProduct['availability'] ?? Product::AVAILABILITY_OUT_OF_STOCK,
            $requestProduct['quantity'] ?? 0,
            $requestProduct['vendor_code'] ?? null,
            $requestProduct['category_id'] ?? null,
            $requestProduct['manufacturer_id'] ?? null,
            $requestProduct['preview'] = null,
            $requestProduct['status'] = true
        );

        foreach ($requestPhotos as $photo) {
            $mediaService = new MediaService($photo);
            $image = $mediaService->getImageInstanceByBlob();

            $path = 'uploads/products/' . $createdProduct->id;
            $path = $mediaService->store($path, $image);

            $createdProduct->addPhoto($path);
        }

        return redirect()->route('admin.products.index')->with('success', 'Товарная позиция добавлена');
    }

    public function edit(Product $product)
    {
        return view('admin.sections.products.edit', [
            'product' => $product
        ]);
    }
}
