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
        return DB::table('t_banners')
            ->where('status', '!=', 0)
            ->whereNotIn('id', [1, 2, 3])
            ->orderBy('id', 'desc')
            ->get();
    }
    public function getActiveBanners()
    {
        return DB::table('t_banners')
            ->where('status', 1)
            ->whereNotIn('id', [1, 2, 3])
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getTrendBanner()
    {
        return DB::table('t_banners')->where([
            'id' => 1
        ])->first();
    }

    public function getHotBanner()
    {
        return DB::table('t_banners')->where([
            'id' => 2
        ])->first();
    }

    public function getSaleBanner()
    {
        return DB::table('t_banners')->where([
            'id' => 3
        ])->first();
    }

    public function bannerById($id)
    {
        return DB::table('t_banners')->where([
            'id' => $id
        ])->first();
    }
}
