<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\enquiryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class homeController extends Controller
{
    public function index()
    {
        return view("main.index");
    }
    public function contact()
    {
        return view("main.contact");
    }

    public function sendEnquiry(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => "required|string",
            'phone' => "required|string",
            'email' => "required|string",
        ]);
        if ($validation->passes()) {
            $insert = enquiryModel::insertGetId([
                "name" => $request->input('name'),
                "phone" => $request->input('phone'),
                "email" => $request->input('email'),
                "message" => $request->input('message'),
            ]);
            if ($insert) {
                $result = [
                    "status" => "success",
                    "message" => "Thanks for contacting us. We will connect you soon!",
                ];
                return response()->json($result);
            } else {
                $result = [
                    "status" => "error",
                    "message" => "Your enquiry could not be sent!",
                ];
                return response()->json($result);
            }
        } else {
            $result = [
                "status" => "error",
                "message" => "Please fill required fields!",
                "error" => $validation->errors()
            ];
            return response()->json($result);
        }
    }
}
