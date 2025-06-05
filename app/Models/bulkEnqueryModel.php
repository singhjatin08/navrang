<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bulkEnqueryModel extends Model
{
    protected $table = "t_bulk_enquiry";
    public $timestamps = true;

    protected $fillable = [
        "product_id",
        "name",
        "phone",
        "quantity",
        "status",
    ];
    protected $dates = [
        'updated_at',
        'created_at',
    ];
}
