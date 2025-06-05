<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\cartModel;
use App\Models\category\categoryModel;
use App\Models\product\productModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


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
        $reviews = DB::table('t_reviews')->where(['product_id'=>$product_id,'status'=>1])->latest()->get();

        return view("main.product-details", ['product' => $product, 'suggestedProduct' => $suggestedProduct,'reviews' => $reviews]);
    }

    public function ProductByCategory($slug)
    {
        $productModel = new productModel();
        $products = $productModel->productByCategory($slug);
        $category_meta = categoryModel::select('meta_tags')->where('slug','=',$slug)->first();  
        return view('main.shop', ['products' => $products,'category_meta'=>$category_meta]);
    }


    public function bulkRates()
    {
        $productModel = new productModel();
        $products = $productModel->getAllProducts();
        return view("main.bulk-rates", ["products" => $products]);
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $products = DB::table('t_products')
            ->leftJoin('t_category as c', 't_products.product_category', '=', 'c.id')
            ->where('t_products.status', 1)
            ->where(function ($q) use ($query) {
                $q->where('t_products.product_title', 'like', '%' . $query . '%')
                  ->orWhere('t_products.product_short_description', 'like', '%' . $query . '%')
                  ->orWhere('t_products.product_description', 'like', '%' . $query . '%');
            })
            ->select('t_products.*', 'c.category_name')
            ->orderBy('t_products.id', 'DESC')
            ->paginate(12);

        return view('main.shop', ['products' => $products, 'searchQuery' => $query]);
    }

    public function submitReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|string',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => "Please enter required fields", 'errors' => $validator->errors()]);
        }

        $insert = DB::table('t_reviews')->insert([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'email' => $request->email,
            'rating' => $request->rating,
            'review' => $request->review,
            'created_at' => now(),
        ]);
        if($insert){
            return response()->json(['status' => 'success', 'message' => 'Review Submit Successfully']);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Exercise Added Successfully']);
        }

    }



}
