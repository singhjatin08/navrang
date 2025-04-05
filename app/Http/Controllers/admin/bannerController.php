<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\bannerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class bannerController extends Controller
{
    public function banners()
    {
        $bannerModel = new bannerModel();
        $banners = $bannerModel->getAllBanners();
        return view("admin.banner.banner", ['banners' => $banners]);
    }

    public function addBanner()
    {
        return view("admin.banner.add-banner");
    }

    public function addBannerProcess(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "banner_subtitle" => "required|string",
            "banner_title" => "required|string",
            "banner_button_text" => "required|string",
            "banner_link" => "required|string",
            "banner_image" => "required|image",
            "status" => "required",
        ]);
        if ($validation->passes()) {
            if ($request->hasFile('banner_image')) {
                $image = $request->file('banner_image');

                $originalName = $image->getClientOriginalName();
                $extension = time() . '.' . $image->getClientOriginalExtension();
                $imageName = uniqid() . "_" . $originalName;
                $path = $image->move('public/banners/' . $imageName);
            }
            $data = [
                'banner_subtitle' => $request->input('banner_subtitle'),
                'banner_title' => $request->input('banner_title'),
                'banner_button_text' => $request->input('banner_button_text'),
                'banner_link' => $request->input('banner_link'),
                'banner_image' => $path,
                'status' => $request->input('status')
            ];
            if ($insert = DB::table('t_banners')->insertGetId($data)) {
                $result = [
                    "status" => "success",
                    "message" => "Banner added successfully!",
                    "user" => $insert
                ];
                return response()->json($result);
            } else {
                $result = [
                    "status" => "error",
                    "message" => "Banner could not be added!",
                    "user" => $insert
                ];
                return response()->json($result);
            }
        } else {
            $result = [
                "status" => "error",
                "error" => $validation->errors()
            ];
            return response()->json($result);
        }
    }

    public function editBanner($id){
        $bannerModel = new bannerModel();
        $banner = $bannerModel->bannerById($id);
        return view("admin.banner.edit-banner", ['banner'=>$banner]);
    }
}
