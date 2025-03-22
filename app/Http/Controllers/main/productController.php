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
        $products = DB::select('
        select p.*, c.category_name from t_products as p 
        left join t_category as c on p.product_category = c.id
        order by p.id desc
        ');
        return view("main.shop", ["products" => $products]);
    }
    public function ProductDetails($product_id)
    {
        $productModel = new productModel();
        $product = $productModel->productByid($product_id);
        return view("main.product-details", ['product' => $product]);
    }

    
}
