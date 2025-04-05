<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\cartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class cartController extends Controller
{
    public function cart()
    {
        return view("main.cart");
    }

    public function getCart()
    {
        $cartItems = []; 
        $cartCount = 0; 

        if (Session::has('user') && Session::get('user') !== null) {
            $userId = Session::get('user')->username;

            $cartItems = DB::table('t_cart as c')
                ->join('t_products as p', 'c.product_id', '=', 'p.product_id')
                ->where('c.username', $userId)
                ->select('c.product_id', 'p.product_title', 'p.product_price', 'p.product_sale_price', 'c.quantity', 'p.product_image')
                ->get();

            $cartCount = $cartItems->count(); // Get the count of items
        } else {
            $cart = json_decode(Cookie::get('cart', '[]'), true);
            if (!is_array($cart)) {
                $cart = [];
            }
            if (!empty($cart)) {
                $productIds = array_column($cart, 'product_id');

                if (!empty($productIds)) {
                    $products = DB::table('t_products')
                        ->whereIn('product_id', $productIds)
                        ->select('product_id', 'product_title', 'product_price', 'product_sale_price', 'product_image')
                        ->get()
                        ->keyBy('product_id');

                    foreach ($cart as &$item) {
                        if (isset($products[$item['product_id']])) {
                            $product = $products[$item['product_id']];
                            $item['product_title'] = $product->product_title;
                            $item['product_price'] = $product->product_price;
                            $item['product_sale_price'] = $product->product_sale_price;
                            $item['product_image'] = $product->product_image;
                        }
                    }
                    $cartItems = $cart;
                    $cartCount = count($cartItems); // Count cart items from cookies
                }
            }
        }

        if (!empty($cartItems)) {
            return response()->json([
                'status' => "success",
                'message' => 'Cart items retrieved successfully',
                'count' => $cartCount, // Add count to response
                'data' => $cartItems,
            ], 200);
        } else {
            return response()->json([
                'status' => "error",
                'message' => 'No products found in the cart',
                'count' => 0, // Cart is empty, so count is 0
                'data' => [],
            ]);
        }
    }

    public function addToCart(Request $request)
    {

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (Session::has('user')) {
            $userId = Session::get('user')->username;

            $cartItem = cartModel::where('username', $userId)->where('product_id', $productId)->first();

            if ($cartItem) {
                $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
            } else {
                cartModel::create([
                    'username' => $userId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ]);
            }

            return response()->json(['message' => 'Product added to cart (Logged-in User)']);
        } else {
            $cart = json_decode(Cookie::get('cart', '[]'), true);

            $found = false;
            foreach ($cart as &$item) {
                if ($item['product_id'] == $productId) {
                    $item['quantity'] += $quantity;
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $cart[] = ['product_id' => $productId, 'quantity' => $quantity];
            }

            Cookie::queue('cart', json_encode($cart), 60 * 24 * 30);

            return response()->json(['message' => 'Product added to cart (Guest User)']);
        }
    }

    public function reduceQuantity(Request $request)
    {

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (Session::has('user')) {
            $userId = Session::get('user')->username;

            $cartItem = cartModel::where('username', $userId)->where('product_id', $productId)->first();

            if ($cartItem) {
                if ($cartItem->quantity == 1) {
                    $deleted = DB::table('t_cart')->where('product_id', '=', $productId)->delete();
                    return response()->json(['message' => 'Product remove from cart (Logged-in User)']);
                }
                $cartItem->update(['quantity' => $cartItem->quantity - $quantity]);
            } else {
                return response()->json(['message' => 'Product not found!']);
            }

            return response()->json(['message' => 'Product update in cart (Logged-in User)']);
        } else {
            $cart = json_decode(Cookie::get('cart', '[]'), true);
            $updatedCart = [];

            foreach ($cart as $item) {
                if ($item['product_id'] == $productId) {
                    if ($item['quantity'] == 1) {
                        // Skip adding this item to remove it from the cart
                        continue;
                    }
                    $item['quantity'] -= $quantity;
                }
                $updatedCart[] = $item;
            }

            // Update cookie with new cart data
            Cookie::queue('cart', json_encode($updatedCart), 60 * 24 * 30);

            if (count($updatedCart) < count($cart)) {
                return response()->json(['message' => 'Product removed from cart (Guest User)']);
            } else {
                return response()->json(['message' => 'Product updated in cart (Guest User)']);
            }
        }
    }

    public function deleteCart(Request $request, $pId)
    {
        if (Session::has('user')) {
            $deleted = DB::table('t_cart')->where('product_id', '=', $pId)->delete();
            if ($deleted) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'cart deleted successfully!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'cart could not be deleted!'
                ]);
            }
        } else {
            $cart = json_decode(Cookie::get('cart', '[]'), true);

            $cart = array_filter($cart, function ($item) use ($pId) {
                return $item['product_id'] != $pId;
            });
            $cart = array_values($cart);
            Cookie::queue('cart', json_encode($cart), 60 * 24 * 30);

            return response()->json([
                'status' => 'success',
                'message' => 'Cart item deleted successfully (Guest User)!'
            ]);
        }
    }
}
