<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class metaModel extends Model
{
    protected $table = "t_meta_tags_and_scripts";
    public $timestamps = true;
    protected $fillable = [
        'head_scripts',
        'body_scripts', 
    ];
    protected $dates = [
        'updated_at',
        'created_at',
    ];
}
