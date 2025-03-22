<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Model;

class productGalleryModel extends Model
{
    protected $table = 't_product_gallery';
    public $timestamps = true;
    protected $fillable = [
        'product_id',
        'type',
        'file_path',
        'created_by',
        'status'
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
