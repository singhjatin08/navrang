<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class productModel extends Model
{
    protected $table = 't_products';
    public $timestamps = true;
    protected $fillable = [
        'product_id',
        'product_title',
        'product_category',
        'product_price',
        'product_discount_percentage',
        'product_short_description',
        'product_description',
        'product_image',
        'feature_product',
        'seo_tags',
        'status',
        'created_by',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];



    public function productById($productId)
    {
        $product = DB::table("t_products")
            ->leftJoin('t_category as c', 't_products.product_category', '=', 'c.id')
            ->where([
                "t_products.product_id" => $productId,
                "t_products.status" => 1,
            ])
            ->select("t_products.*", "c.category_name", "c.id as category_id")
            ->first();

        if ($product) {
            // Fetch product gallery images
            $product->gallery_images = DB::table('t_product_gallery')
                ->where([
                    'product_id' => $product->product_id,
                    'status' => 1
                ])
                ->get()
                ->toArray();

            $suggestedProducts = DB::table("t_products")
                ->leftJoin('t_category as c', 't_products.product_category', '=', 'c.id')
                ->where([
                    // "product_category" => $product->category_id,
                    "t_products.status" => 1,
                ])
                ->where("product_id", "!=", $productId)
                ->select("t_products.*", "c.category_name")
                ->inRandomOrder()
                ->limit(4)
                ->get();

            return [
                'product' => $product,
                'suggestedProducts' => $suggestedProducts
            ];
        }

        return null;
    }


    public function latestProduct()
    {
        $products = DB::table("t_products")
            ->leftJoin('t_category as c', 't_products.product_category', '=', 'c.id')
            ->where([
                "t_products.status" => 1,
                "t_products.stock" => 1,
                "t_products.feature_product" => null,
            ])
            ->select("t_products.*", "c.category_name")
            ->limit(10)
            ->orderBy("id", "desc")
            ->get();

        if (!$products->isEmpty()) {
            foreach ($products as $product) {
                $product->gallery_images = DB::table('t_product_gallery')
                    ->where([
                        'product_id' => $product->product_id,
                        'status' => 1
                    ])
                    ->get()
                    ->toArray();
            }
        }

        return $products;
    }



    public function featureProducts()
    {
        $products = DB::table("t_products")
            ->leftJoin('t_category as c', 't_products.product_category', '=', 'c.id')
            ->where([
                "t_products.status" => 1,
                "t_products.stock" => 1,
                "t_products.feature_product" => "Yes",
            ])
            ->select("t_products.*", "c.category_name")
            ->limit(8)
            ->orderBy("id", "desc")
            ->get();

        if (!$products->isEmpty()) {
            foreach ($products as $product) {
                $product->gallery_images = DB::table('t_product_gallery')
                    ->where([
                        'product_id' => $product->product_id,
                        'status' => 1
                    ])
                    ->get()
                    ->toArray();
            }
        }

        return $products;
    }


    public function productByCategory($slug)
    {
        $products = DB::table("t_products")
            ->leftJoin('t_category as c', 't_products.product_category', '=', 'c.id')
            ->where([
                "c.slug" => $slug,
                "t_products.status" => 1,
            ])
            ->select("t_products.*", "c.category_name")
            ->orderBy('t_products.id', 'DESC')
            ->paginate(12);

        if (!$products->isEmpty()) {
            foreach ($products as $product) {
                $product->gallery_images = DB::table('t_product_gallery')
                    ->where([
                        'product_id' => $product->product_id,
                        'status' => 1
                    ])
                    ->get()
                    ->toArray();
            }
        }

        return $products;
    }


    public function getAllProducts()
    {
        $products = DB::table('t_products')
            ->leftJoin('t_category as c', 't_products.product_category', '=', 'c.id')
            ->select('t_products.*', 'c.category_name')
            ->orderBy('t_products.id', 'DESC')
            ->paginate(12);
            return $products;
    }
}
