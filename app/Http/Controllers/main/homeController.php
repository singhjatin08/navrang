<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\bannerModel;
use App\Models\blogsModel;
use App\Models\enquiryModel;
use App\Models\product\productModel;
use App\Models\subscribeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class homeController extends Controller
{
    public function index()
    {
        $productModel = new productModel();
        $latestProducts = $productModel->latestProduct();
        $featureProducts = $productModel->featureProducts();

        $blogModel = new blogsModel();
        $blogs = $blogModel->latestTwoBlogs();

        $bannerModel = new bannerModel();
        $banners = $bannerModel->getAllBanners();

        $trendBanner = $bannerModel->getTrendBanner();

        $hotBanner = $bannerModel->getHotBanner();

        $saleBanner = $bannerModel->getSaleBanner();

        return view("main.index", ['latestProducts' => $latestProducts, 'blogs' => $blogs, 'featureProducts' => $featureProducts, 'banners' => $banners, 'trendBanner' => $trendBanner, 'hotBanner' => $hotBanner, 'saleBanner' => $saleBanner]);
    }

    public function about()
    {
        return view('main.about');
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

    public function sendBulkEnquiry(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => "required|string",
            'phone' => "required|string",
            'quantity' => "required|string",
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

    public function subscribeNow(Request $request){
        $validation = Validator::make($request->all(), [
            'email' => "required|string|email",
        ]);
        if ($validation->passes()) {
            $email = $request->input('email');
            $checkEmail = DB::table("subscribers")->where("email", $email)->count();
            if ($checkEmail > 0) {
                return response()->json([
                    "status" => "error",
                    "message" => "You are already subscribed!",
                ]);
            } else {
                $s_id =subscribeModel::insertGetId([
                    "email" => $email, 
                ]);
                return response()->json([
                    "status" => "success",
                    "message" => "Thanks for subscribing!",
                    "id" => $s_id
                ]);
            }
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Please fill required fields!",
                "error" => $validation->errors()
            ]);
        }
    }
}
