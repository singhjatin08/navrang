<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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


    public function getAllUsers(){
        $users = DB::table('t_users')->get();
        return $users;
    }
}
