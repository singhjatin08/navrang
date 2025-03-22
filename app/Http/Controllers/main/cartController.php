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
    public function cart(){
        return view("main.cart");
    }
    public function getCart()
    {
        if (Session::has('user')) {
            $userId = Session::get('user')->username;

            $cartItems = DB::table('t_cart as c')
                ->join('t_products as p', 'c.product_id', '=', 'p.product_id')
                ->where('c.username', $userId)
                ->select('c.product_id', 'p.product_title', 'p.product_price', 'p.product_sale_price', 'c.quantity', 'p.product_image')
                ->get();
        } else {
            $cart = json_decode(Cookie::get('cart', '[]'), true);
            $productIds = array_column($cart, 'product_id');

            $cartItems = [];
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
            }
        }

        if (!empty($cartItems)) {
            return response()->json([
                'status' => "success",
                'message' => 'Cart items retrieved successfully',
                'data' => $cartItems,
            ], 200);
        } else {
            return response()->json([
                'status' => "error",
                'message' => 'No products found in the cart',
                'data' => [],
            ], 404);
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

    public function deleteCart(Request $request, $pId)
    {
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
    }
}
