<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Api\BaseController;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CartController extends BaseController
{
    private function getCartItems()
    {
        return collect(json_decode(Cookie::get('cart')));
    }

    public function getItems()
    {
        return $this->sendResponse([
            'items' => $this->getCartItems()
        ], 'Request completed successfully.');
    }


    public function setCartItem(Request $request)
    {
        $productId = $request->productId;
        $quantity = $request->quantity ?? 1;

        if ($quantity < 1) {
            return $this->sendError('Почему-то, вы пытаетесь установить количество товара в корзине меньше единицы');
        }

        $productInDb = Product::find($productId);
        if (!$productInDb) {
            return $this->sendError('Товар с указанным идентификатором не найден');
        }
        if (!$productInDb->isAvailable()) {
            return $this->sendError('Не удалось добавить товар в корзине. Возможно он не в наличии, или недоступен для покупки');
        }


        $cartItems = $this->getCartItems();
        $productInCart = $cartItems->where('product_id', $productId)->first();
        if ($productInCart) {
            // Товар уже есть в корзине, не меняя индекс - меняем значение количества
            $productInCart->quantity = $quantity;

            $index = $cartItems->search($productInCart);
            $cartItems->toArray()[$index] = $productInCart;
            $cartItems = collect($cartItems);
        } else {
            // Товара нет в корзине - нужно добавить его туда
            $cartProduct = [
                'product_id' => $productId,
                'quantity' => $quantity,
                'name' => $productInDb->name,
                'preview' => $productInDb->preview ?? null,
                'price' => $productInDb->price,
                'slug' => $productInDb->slug
            ];

            $cartItems->push(collect($cartProduct));
        }


        Cookie::queue('cart', $cartItems);
        return $this->sendResponse([], 'increase');
    }

    public function unsetCartItem(Request $request)
    {
        $productId = $request->productId;

        $productInDb = Product::find($productId);
        if (!$productInDb) {
            return $this->sendError('Товар с указанным идентификатором не найден');
        }
        if (!$productInDb->isAvailable()) {
            return $this->sendError('Не удалось добавить товар в корзине. Возможно он не в наличии, или недоступен для покупки');
        }

        $cartItems = $this->getCartItems();
        $productInCart = $cartItems->where('product_id', $productId)->first();

        if ($productInCart) {
            $index = $cartItems->search($productInCart);
            $cartItems->forget($index);
        }

        Cookie::queue('cart', $cartItems);
        return $this->sendResponse([], 'decrease');
    }

    public function toggleCartItem(Request $request)
    {
        $productId = $request->productId;

        $productInDb = Product::find($productId);
        if (!$productInDb) {
            return $this->sendError('Товар с указанным идентификатором не найден');
        }
        if (!$productInDb->isAvailable()) {
            return $this->sendError('Не удалось добавить товар в корзине. Возможно он не в наличии, или недоступен для покупки');
        }


        $cartItems = $this->getCartItems();
        $cartProduct = $cartItems->where('product_id', $productId)->first();
        if ($cartProduct) {
            return $this->unsetCartItem($request);
        }

        return $this->setCartItem($request);
    }

    public function countItems()
    {
        return $this->sendResponse([
            'quantity' => $this->getCartItems()->count()
        ], 'The number of products has been successfully received.');
    }


    // Templates
    public function getMinicartTemplate(Request $request)
    {
        $cartItems = collect($request->cartItems);
        $cartItemsCount = $cartItems->count();
        $totalCost = 0;
        $resultCartItems = collect();

        foreach ($cartItems as $cartItem) {
            $cartItem = (object) ($cartItem);
            $resultCartItems->push($cartItem);

            $totalCost += $cartItem->quantity * $cartItem->price;
        }


        return $this->sendResponse([
            'template' => view('components.shop.cart.minicart', [
                'cartItems' => $resultCartItems,
                'cartItemsCount' => $cartItemsCount,
                'cartItemsTotalCost' => $totalCost
            ])->render()
        ], 'Ok');
    }
}
