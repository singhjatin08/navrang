<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\blogsModel;
use Illuminate\Http\Request;

class blogsController extends Controller
{
    public function blogs(Request $request)
    {
        $blogsModel = new blogsModel();
        $blogs = $blogsModel->getAllBlogs();
        return view("main.blogs", ['blogs' => $blogs]);
    }
    public function blogDetail($slug)
    {
        $blogModel = new blogsModel();
        $blogs = $blogModel->getBlogBySlug($slug);
        $blog = $blogs['blog'];
        $suggestedBlogs = $blogs['suggestedBlogs'];

        
        return view('main.blog-detail', ['blog' => $blog,'suggestedBlogs'=>$suggestedBlogs
    ]);
    }

     public function blogByCategory($slug){
        $blogModel = new blogsModel();
        $blogs = $blogModel->getBlogsByCategory($slug);
        return view("main.blogs", ['blogs' => $blogs]);
     }
}
