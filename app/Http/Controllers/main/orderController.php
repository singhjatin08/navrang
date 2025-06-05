<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\bulkEnqueryModel;
use App\Models\cartModel;
use App\Models\user\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;
// use Razorpay\Api\Errors\Error;

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
            'payment_method' => 'required',
        ]);

        // If billing validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please fill the required fields!',
                'error' => $validator->errors(),
            ]);
        }

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
                ->select('c.product_id', 'p.product_title', 'p.product_price', 'p.product_discount_percentage', 'c.quantity', 'p.product_image')
                ->get();

            // Calculate cart total
            foreach ($cartItems as $item) {
                $cartTotal += ($item->product_price - ($item->product_price / 100 * $item->product_discount_percentage)) * $item->quantity;
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
                ->select('c.product_id', 'p.product_title', 'p.product_price', 'p.product_discount_percentage', 'c.quantity', 'p.product_image')
                ->get();

            // Calculate cart total
            foreach ($cartItems as $item) {
                $cartTotal += ($item->product_price - ($item->product_price / 100 * $item->product_discount_percentage)) * $item->quantity;
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
        if ($request->input('payment_method') == 'Cash On Deliery') {
            $order = DB::table('t_orders')->insertGetId([
                'order_id' => $order_id,
                'username' => $userId,
                'billing_name' => $request->name,
                'billing_contact' => $request->phone,
                'billing_email' => $request->email,
                'billing_address' => $billing_address,
                'shipping_address' => $shipping_address,
                'total_amount' => $total_order_amount,
                'payment_method' => $request->payment_method,
                'payment_status' => "Pending",
                'order_status' => "Pending",
                "order_note" => $request->input('order_note'),
            ]);

            // Insert order items into t_order_items
            foreach ($cartItems as $item) {
                $price = $item->product_price - ($item->product_price / 100 * $item->product_discount_percentage);

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

            // Shiprocket Order Creation
            // $tokenResponse = Http::post('https://apiv2.shiprocket.in/v1/external/auth/login', [
            //     'email' => env('SHIPROCKET_EMAIL'),
            //     'password' => env('SHIPROCKET_PASSWORD'),
            // ]);

            // if ($tokenResponse->successful()) {
            //     $token = $tokenResponse->json()['token'];

            //     $shipOrder = Http::withToken($token)->post('https://apiv2.shiprocket.in/v1/external/orders/create/adhoc', [
            //         "order_id" => $order_id,
            //         "order_date" => now()->format('Y-m-d'),
            //         "pickup_location" => "Your Pickup Location",
            //         "billing_customer_name" => $request->name,
            //         "billing_address" => $request->billing_address,
            //         "billing_city" => $request->billing_state,
            //         "billing_pincode" => $request->billing_postcode,
            //         "billing_country" => $request->billing_country,
            //         "billing_email" => $request->email,
            //         "billing_phone" => $request->phone,
            //         "shipping_is_billing" => true,
            //         "order_items" => $cartItems->map(function ($item) {
            //             return [
            //                 "name" => $item->product_title,
            //                 "sku" => $item->product_id,
            //                 "units" => $item->quantity,
            //                 "selling_price" => $item->product_price
            //             ];
            //         })->toArray(),
            //         "payment_method" => $request->payment_method == 'razorpay' ? "Prepaid" : "COD",
            //         "sub_total" => $total_order_amount,
            //     ]);

            //     // Optional: Save shipment tracking info
            //     if ($shipOrder->successful()) {
            //         $shipmentData = $shipOrder->json();
            //         DB::table('t_orders')->where('order_id', $order_id)
            //             ->update(['shiprocket_shipment_id' => $shipmentData['shipment_id']]);
            //     }
            // }


            return response()->json([
                'status' => 'success',
                'method' => 'cod',
                'message' => 'Order placed successfully',
                'order_id' => $order_id,
                'total' => $total_order_amount,
                // 'shipment_id' => $shipmentData['shipment_id'] ?? null,
            ]);
        } else {

            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $razorpayOrder = $api->order->create([
                'receipt' => $order_id,
                'amount' => $total_order_amount * 100,
                'currency' => 'INR'
            ]);
            return response()->json([
                'status' => 'success',
                'method' => 'razorpay',
                'message' => 'Proceed to payment',
                'order_id' => $order_id,
                'razorpay_order_id' => $razorpayOrder['id'],
                'total' => $total_order_amount,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
            ]);
        }
    }


    public function verifyPayment(Request $request)
    {

        $signatureStatus = false;
        try {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];
            $api->utility->verifyPaymentSignature($attributes);
            $signatureStatus = true;

            DB::table('t_orders')->where('order_id', $request->order_id)
                ->update(['payment_status' => 'Paid', 'payment_method' => 'Razorpay']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Payment verification failed!']);
        }

        return response()->json(['status' => 'success']);
    }

    public function razorpayCreateOrder(Request $request)
    {

        $cartItems = [];
        $cartTotal = 0;
        $userId = null;

        if (Session::has('user') && Session::get('user') !== null) {
            $userId = Session::get('user')->username;

            // Fetch cart items
            $cartItems = DB::table('t_cart as c')
                ->join('t_products as p', 'c.product_id', '=', 'p.product_id')
                ->where('c.username', $userId)
                ->select('c.product_id', 'p.product_title', 'p.product_price', 'p.product_discount_percentage', 'c.quantity', 'p.product_image')
                ->get();

            // Calculate cart total
            foreach ($cartItems as $item) {
                $cartTotal += ($item->product_price - ($item->product_price / 100 * $item->product_discount_percentage)) * $item->quantity;
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
                ->select('c.product_id', 'p.product_title', 'p.product_price', 'p.product_discount_percentage', 'c.quantity', 'p.product_image')
                ->get();

            // Calculate cart total
            foreach ($cartItems as $item) {
                $cartTotal += ($item->product_price - ($item->product_price / 100 * $item->product_discount_percentage)) * $item->quantity;
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
        $order = DB::table('t_orders')->insertGetId([
            'order_id' => $order_id,
            'username' => $userId,
            'billing_name' => $request->name,
            'billing_contact' => $request->phone,
            'billing_email' => $request->email,
            'billing_address' => $billing_address,
            'shipping_address' => $shipping_address,
            'total_amount' => $total_order_amount,
            'payment_method' => 'razorpay',
            'payment_id' => $request->razorpay_payment_id,
            'payment_status' => "paid",
            'order_status' => "Pending",
            "order_note" => $request->input('order_note'),
        ]);

        // Insert order items into t_order_items
        foreach ($cartItems as $item) {
            $price = $item->product_price - ($item->product_price / 100 * $item->product_discount_percentage);

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
            'method' => 'cod',
            'message' => 'Order placed successfully',
            'order_id' => $order_id,
            'total' => $total_order_amount
        ]);
    }

    public function bulkRateEnquiry(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'quantity' => 'required|string',

        ]);
        if ($validator->passes()) {
            $data = [
                'product_id' => $request->input('product_id'),
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'quantity' => $request->input('quantity'),
                'status' => '2',
            ];
            $insert = bulkEnqueryModel::insertGetId($data);
            if ($insert) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Enquery Submitted! We will connect you soon!',
                    'id' => $insert,
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Enquery Failed!',
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Please fill required fields!',
                'error' =>  $validator->errors(),
            ]);
        }
    }
}
