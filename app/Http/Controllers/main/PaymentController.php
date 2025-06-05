<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\cartModel;
use App\Models\product\productModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function createOrder()
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $order = $api->order->create([
            'receipt'         => uniqid(),
            'amount'          => 100 * 100, // Amount in paise (₹100 = 10000)
            'currency'        => 'INR'
        ]);

        return view('payment', ['order' => $order]);
    }
    public function createRazorpayOrder(Request $request)
{
    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    // Here you calculate total cart amount
    $amount = 500 * 100; // Example: 500 rupees

    $order = $api->order->create([
        'receipt' => 'order_rcptid_11',
        'amount' => $amount,
        'currency' => 'INR'
    ]);

    return response()->json([
        'status' => 'success',
        'order' => $order
    ]);
}
public function orderProcess(Request $request)
{
    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    $attributes = [
        'razorpay_order_id' => $request->razorpay_order_id,
        'razorpay_payment_id' => $request->razorpay_payment_id,
        'razorpay_signature' => $request->razorpay_signature
    ];

    try {
        $api->utility->verifyPaymentSignature($attributes);

        // Payment is verified, now save order to database
        // Create order, reduce stock, send email etc.

        return response()->json([
            'status' => 'success',
            'message' => 'Order placed successfully!'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Payment verification failed!'
        ]);
    }
}
    public function paymentSuccess(Request $request)
    {
        // Validate the payment here as needed
        return 'Payment Successful!';
    }
    
}
