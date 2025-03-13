<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    protected $table = 't_users';
    public $timestamps = true;
    protected $fillable = [
        'username',
        'name',
        'phone',
        'email',
        'password',
        'token',
        'status',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
