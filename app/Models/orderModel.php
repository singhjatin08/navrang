<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class orderModel extends Model
{
    protected $table = 't_orders';
    public $timestamps = true;
    protected $fillable = [
        'order_id',
        'username',
        'total_amount',
        'billing_name',
        'billing_contact',
        'billing_email',
        'billing_address',
        'shipping_address',
        'order_note',
        'shipping_method',
        'payment_method',
        'payment_status',
        'order_status',
        'order_date_time',
        'updated_at',
    ];
    protected $dates = [
        'updated_at',
        'created_at',
    ];


    public function getOrderDetail()
    {
        $orders = DB::table('t_orders')->get();

        foreach ($orders as $order) {
            $order->items = DB::table('t_order_items')
                ->leftJoin('t_products', 't_products.product_id', '=', 't_order_items.product_id')
                ->where('t_order_items.order_id', '=', $order->order_id)
                ->select('t_order_items.*', 't_products.product_image')
                ->get();
        }

        return $orders;
    }
    public function getOrderDetailbyID($order_id)
    {
        $order = DB::table('t_orders')->where('order_id', "=", $order_id)->first();

        $order->items = DB::table('t_order_items')
            ->leftJoin('t_products', 't_products.product_id', '=', 't_order_items.product_id')
            ->where('t_order_items.order_id', '=', $order->order_id)
            ->select('t_order_items.*', 't_products.product_image', 't_products.product_title')
            ->get();


        return $order;
    }

    public function getOrderDetailbyUserID($username)
    {
        $orders = DB::table('t_orders')->where('username','=', $username)->get();

        foreach ($orders as $order) {
            $order->items = DB::table('t_order_items')
                ->leftJoin('t_products', 't_products.product_id', '=', 't_order_items.product_id')
                ->where('t_order_items.order_id', '=', $order->order_id)
                ->select('t_order_items.*', 't_products.product_image')
                ->get();
        }

        return $orders;
    }
}
