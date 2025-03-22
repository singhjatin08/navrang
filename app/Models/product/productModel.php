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
        'product_sale_price',
        'product_short_description',
        'product_description',
        'product_image',
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
            ->select("t_products.*", "c.category_name")
            ->first();

        if ($product) {
            $product->gallery_images = DB::table('t_product_gallery')
                ->where([
                    'product_id' => $product->product_id,
                    'status' => 1
                ])
                ->get()
                ->toArray();
        }

        return $product;
    }
}
