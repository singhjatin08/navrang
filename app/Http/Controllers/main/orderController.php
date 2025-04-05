<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\cartModel;
use App\Models\user\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class orderController extends Controller
{
    public function checkout()
    {
        return view("main.checkout");
    }

    public function orderProcess(Request $request)
    {
        // Validate the request data (billing details, shipping address, etc.)
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'billing_country' => 'required',
            'billing_address' => 'required|string|max:255',
            'billing_state' => 'required|string|max:255',
            'billing_postcode' => 'required|string|max:255',
            'payment_method'=>'required',
        ]);

        // If billing validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please fill the required fields!',
                'error' => $validator->errors(),
            ]);
        }

        // Check if different_shipping_address is set to "Yes" and validate shipping details
        if ($request->input('different_shipping_address') == "Yes") {
            $shippingValidator = Validator::make($request->all(), [
                'shipping_country' => 'required|string|max:255',
                'shipping_address' => 'required|string|max:255',
                'shipping_state' => 'required|string|max:255',
                'shipping_postcode' => 'required|string|max:255',
            ]);

            // If shipping validation fails
            if ($shippingValidator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Please fill the required fields!',
                    'error' => $shippingValidator->errors(),
                ]);
            }
        }

        // Get the cart items
        $cartItems = [];
        $cartTotal = 0;
        $userId = null;

        if (Session::has('user') && Session::get('user') !== null) {
            $userId = Session::get('user')->username;

            // Fetch cart items
            $cartItems = DB::table('t_cart as c')
                ->join('t_products as p', 'c.product_id', '=', 'p.product_id')
                ->where('c.username', $userId)
                ->select('c.product_id', 'p.product_title', 'p.product_price', 'p.product_sale_price', 'c.quantity', 'p.product_image')
                ->get();

            // Calculate cart total
            foreach ($cartItems as $item) {
                $cartTotal += $item->product_sale_price * $item->quantity;
            }
        } else {

            $emailExist = userModel::where("email", $request->input('email'))->exists();
            if (!$emailExist) {
                $name = $request->input('name');
                $phone = $request->input('phone');
                $email = $request->input('email');
                $username = strtolower(preg_replace('/\s+/', '', $name)) . substr($phone, -4) . rand(100, 999);

                $data = [
                    'username' => $username,
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email,
                    'password' => md5($email),
                    'status' => 1,
                ];
                $insert = userModel::insertGetId($data);
                if ($insert) {
                    $user = userModel::where("username", $username)->first();
                    $userId = $user->username;
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'User was not found & could not be registered!',
                    ]);
                }
            } else {
                $user = userModel::where("email", $request->input('email'))->first();
                $userId = $user->username;
            }

            $cookieCart = json_decode(Cookie::get('cart', '[]'), true);
            if (!empty($cookieCart)) {
                foreach ($cookieCart as $item) {
                    if (!empty($item['product_id'])) {
                        cartModel::create([
                            'username' => $userId,
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                        ]);
                    }
                }
                Cookie::queue(Cookie::forget('cart'));
            }

            $cartItems = DB::table('t_cart as c')
                ->join('t_products as p', 'c.product_id', '=', 'p.product_id')
                ->where('c.username', $userId)
                ->select('c.product_id', 'p.product_title', 'p.product_price', 'p.product_sale_price', 'c.quantity', 'p.product_image')
                ->get();

            // Calculate cart total
            foreach ($cartItems as $item) {
                $cartTotal += $item->product_sale_price * $item->quantity;
            }
        }

        // Check if cart is empty
        if (empty($cartItems)) {
            return response()->json([
                'status' => 'error',
                'message' => 'No products found in the cart',
            ]);
        }

        $order_id = "NOD0" . date('Y') . "0" . uniqid();
        $total_order_amount =  $request->input('total_order_amount');
        $billing_address = $request->input('billing_address') . " , " . $request->input('billing_state') . " , " . $request->input('billing_country') . " ," . $request->input('billing_postcode');

        if ($request->input('different_shipping_address') == "Yes") {
            $shipping_address = $request->input('shipping_address') . " , " . $request->input('shipping_state') . " , " . $request->input('shipping_country') . " ," . $request->input('shipping_postcode');
        } else {
            $shipping_address = $billing_address;
        }
        // Insert into t_orders
        $order = DB::table('t_orders')->insertGetId([
            'order_id' => $order_id,
            'username' => $userId,
            'billing_name' => $request->name,
            'billing_contact' => $request->phone,
            'billing_email' => $request->email,
            'billing_address' => $billing_address,
            'shipping_address' => $shipping_address,
            'total_amount' => $total_order_amount,
            'payment_method'=>$request->payment_method,
            'payment_status' => "Pending",
            'order_status' => "Pending",
            "order_note" => $request->input('order_note'),
        ]);

        // Insert order items into t_order_items
        foreach ($cartItems as $item) {
            $price = !empty($item->product_sale_price) ? $item->product_sale_price : $item->product_price;

            $insertItem = DB::table('t_order_items')->insertGetId([
                'order_id' => $order_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $price,
            ]);
        }


        if ($insertItem) {
            DB::table('t_cart')->where('username', $userId)->delete();
        } else {
            Cookie::queue(Cookie::forget('cart'));
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Order placed successfully',
            'order_id' => $order,
            'total' => $total_order_amount,
        ]);
    }
}
