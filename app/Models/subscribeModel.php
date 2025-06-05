<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subscribeModel extends Model
{
    protected $table = "t_subscribe";
    public $timestamps = true;
    protected $fillable = [ 
        'email', 
    ];
    protected $dates = [
        'created_at',
    ];
}
