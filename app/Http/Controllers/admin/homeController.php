<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller; 

class homeController extends Controller
{
    public function index(){
        return view("admin/index");
    }
}
