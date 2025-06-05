<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class blogsModel extends Model
{
    protected $table = 't_blogs';
    public $timestamps = true;
    protected $fillable = [
        'slug',
        'title',
        'short_description',
        'description',
        'category',
        'tags',
        'author',
        'feature_image',
        'seo_tags',
        'status',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function latestTwoBlogs()
    {
        return DB::table('t_blogs')
            ->leftJoin('t_category', 't_blogs.category', '=', 't_category.id')
            ->where('t_blogs.status', 1)
            ->select('t_blogs.*', 't_category.category_name', 't_category.slug as category_slug')
            ->orderByDesc('t_blogs.id') 
            ->limit(2)
            ->get();
            
    }

    public function getAllBlogs()
    {
        return DB::table('t_blogs')
            ->leftJoin('t_category', 't_blogs.category', '=', 't_category.id')
            ->where('t_blogs.status', 1)
            ->select('t_blogs.*', 't_category.category_name', 't_category.slug as category_slug')
            ->orderByDesc('t_blogs.id') 
            ->paginate(6);
            
    }

    public function getBlogBySlug($slug)
    {
        $blog = DB::table('t_blogs')
            ->leftJoin('t_category', 't_blogs.category', '=', 't_category.id')
            ->where('t_blogs.status', 1)
            ->where('t_blogs.slug', $slug)
            ->select('t_blogs.*', 't_category.category_name', 't_category.slug as category_slug')
            ->first();

        if (!$blog) {
            return ['blog' => null, 'suggestedBlogs' => []]; 
        }

        $suggestedBlogs = DB::table('t_blogs')
            ->leftJoin('t_category', 't_blogs.category', '=', 't_category.id')
            ->where('t_blogs.status', 1)
            ->where('t_blogs.id', '!=', $blog->id)
            ->inRandomOrder()
            ->limit(3)
            ->select('t_blogs.*', 't_category.category_name', 't_category.slug as category_slug')
            ->get();

        return [
            'blog' => $blog,
            'suggestedBlogs' => $suggestedBlogs
        ];
    }

    public function getBlogsByCategory($slug)
    {
        return DB::table('t_blogs')
            ->leftJoin('t_category', 't_blogs.category', '=', 't_category.id')
            ->where('t_blogs.status', 1)
            ->where('t_category.slug', $slug)
            ->select('t_blogs.*', 't_category.category_name', 't_category.slug as category_slug')
            ->orderByDesc('t_blogs.id') // Fetch latest blogs first
            ->paginate(6);
    }
}
