<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\enquiryModel;
use App\Models\user\userModel;

class homeController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }

    public function users()
    {
        $userModel = new userModel();
        $users = $userModel->getAllUsers();
        return view("admin.users", ["users" => $users]);
    }

    public function enquiry()
    {
        $data = enquiryModel::get();
        return view("admin.enquiry", ['enquiries' => $data]);
    }
}
