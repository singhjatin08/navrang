<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\cartModel;
use App\Models\product\productModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class productController extends Controller
{
    public function shop()
    {
        $productModel = new productModel();
        $products = $productModel->getAllProducts();
        return view("main.shop", ["products" => $products]);
    }
    public function ProductDetails($product_id)
    {
        $productModel = new productModel();
        $products = $productModel->productByid($product_id);
        $product = $products['product'];
        $suggestedProduct = $products['suggestedProducts'];
        // echo "<pre>";
        // print_r($suggestedProduct);
        // exit;
        return view("main.product-details", ['product' => $product, 'suggestedProduct' => $suggestedProduct]);
    }

    public function ProductByCategory($slug)
    {
        $productModel = new productModel();
        $products = $productModel->productByCategory($slug);
        return view('main.shop', ['products' => $products]);
    }
}
