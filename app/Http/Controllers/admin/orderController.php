<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\bulkEnqueryModel;
use App\Models\orderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class orderController extends Controller
{
    public function orders()
    {
        $orderModel = new OrderModel();
        $orders = $orderModel->getOrderDetail();
        return view("admin.order.orders", ['orders' => $orders]);
    }

    public function orderDetails($order_id)
    {
        $orderModel = new orderModel();
        $order = $orderModel->getOrderDetailbyID($order_id);
        return view("admin.order.viewOrder", ['order' => $order]);
    }

    public function updateStatus(Request $request, $order_id)
    {
        $validator = Validator::make($request->all(), [
            'order_status' => 'required|string',
            'payment_status' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validator->errors()
            ]);
        }

        $update = orderModel::where('order_id', $order_id)
            ->update([
                'order_status' => $request->input('order_status'),
                'payment_status' => $request->input('payment_status'),
            ]);

        if ($update) {
            return response()->json([
                'status' => 'success',
                'message' => 'Order status updated successfully!'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No Changes found!'
            ]);
        }
    }


    public function bulkRateEnquiry()
    {
        $enquiries = bulkEnqueryModel::orderBy("id", "DESC")->get();
        return view("admin.bulk-enquiry", ["enquiries" => $enquiries]);
    }

    public function deleteBulkEnquiry(Request $request, $cId)
    {
        $deleted = bulkEnqueryModel::where('id', $cId)->delete();

        if ($deleted) {
            return response()->json([
                'status' => 'success',
                'message' => 'Enquiry deleted successfully!'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Enquiry could not be deleted!'
            ]);
        }
    }
}
