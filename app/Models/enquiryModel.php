<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class enquiryModel extends Model
{
    protected $table = "t_enquiry";
    public $timestamps = true;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
    ];
    protected $dates = [
        'created_at',
    ];
}
