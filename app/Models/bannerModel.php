<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class bannerModel extends Model
{
    protected $table = 't_banners';
    public $timestamps = true;
    protected $fillable = [
        'banner_title',
        'banner_subtitle',
        'banner_link',
        'banner_image',
        'status',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getAllBanners()
    {
        return DB::table('t_banners')->where('status', '!=', 0)->orderBy('id', 'desc')->get();
    }
    public function getActiveBanners()
    {
        return DB::table('t_banners')->where('status', '=', 1)->orderBy('id', 'desc')->get();
    }
    public function bannerById($id)
    {
        return DB::table('t_banners')->where([
            'id' => $id
        ])->first();
    }
}
