<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\bannerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class bannerController extends Controller
{
    public function banners()
    {
        $bannerModel = new bannerModel();
        $banners = $bannerModel->getAllBanners();

        $trendBanner = $bannerModel->getTrendBanner();

        $hotBanner = $bannerModel->getHotBanner();

        $saleBanner = $bannerModel->getSaleBanner();

        return view("admin.banner.banner", ['banners' => $banners,'trendBanner'=>$trendBanner,'hotBanner'=>$hotBanner,'saleBanner'=>$saleBanner]);
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
            $path = null;

            if ($request->hasFile('banner_image')) {
                $image = $request->file('banner_image');
                $originalName = $image->getClientOriginalName();
                $imageName = uniqid() . "_" . $originalName;

                // Save to public/banners/
                $image->move(public_path('banners'), $imageName);

                // Save relative path in DB
                $path = 'public/banners/' . $imageName;
            }

            $data = [
                'banner_subtitle' => $request->input('banner_subtitle'),
                'banner_title' => $request->input('banner_title'),
                'banner_button_text' => $request->input('banner_button_text'),
                'banner_link' => $request->input('banner_link'),
                'banner_image' => $path,
                'status' => $request->input('status')
            ];

            $insert = DB::table('t_banners')->insertGetId($data);

            if ($insert) {
                return response()->json([
                    "status" => "success",
                    "message" => "Banner added successfully!",
                    "user" => $insert
                ]);
            } else {
                return response()->json([
                    "status" => "error",
                    "message" => "Banner could not be added!"
                ]);
            }
        } else {
            return response()->json([
                "status" => "error",
                "error" => $validation->errors()
            ]);
        }
    }

    public function editBanner($id)
    {
        $bannerModel = new bannerModel();
        $banner = $bannerModel->bannerById($id);
        return view("admin.banner.edit-banner", ['banner' => $banner]);
    }

    public function updateBannerProcess(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "banner_id" => "required|integer|exists:t_banners,id",
            "banner_subtitle" => "required|string",
            "banner_title" => "required|string",
            "banner_button_text" => "required|string",
            "banner_link" => "required|string",
            "banner_image" => "nullable|image",
            "status" => "required",
        ]);

        if ($validation->fails()) {
            return response()->json([
                "status" => "error",
                "error" => $validation->errors()
            ]);
        }

        $data = [
            'banner_subtitle' => $request->input('banner_subtitle'),
            'banner_title' => $request->input('banner_title'),
            'banner_button_text' => $request->input('banner_button_text'),
            'banner_link' => $request->input('banner_link'),
            'status' => $request->input('status')
        ];

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $originalName = $image->getClientOriginalName();
            $imageName = uniqid() . "_" . $originalName;

            $image->move(public_path('banners'), $imageName);
            $path = 'public/banners/' . $imageName;

            $data['banner_image'] = $path;
        }

        $updated = DB::table('t_banners')
            ->where('id', $request->input('banner_id'))
            ->update($data);

        if ($updated) {
            return response()->json([
                "status" => "success",
                "message" => "Banner updated successfully!"
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Banner could not be updated or no changes made!"
            ]);
        }
    }
    public function deleteBanner(Request $request, $cId)
    {
        $deleted = DB::table('t_banners')->where('id', '=', $cId)->delete();

        if ($deleted) {
            return response()->json([
                'status' => 'success',
                'message' => 'Banner deleted successfully!'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Banner could not be deleted!'
            ]);
        }
    }

    public function updateTrendBannerProcess(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "banner_subtitle" => "required|string",
            "banner_title" => "required|string",
            "banner_button_text" => "required|string",
            "banner_link" => "required|string",
            "banner_image" => "nullable|image",
        ]);

        if ($validation->fails()) {
            return response()->json([
                "status" => "error",
                "error" => $validation->errors()
            ]);
        }

        $data = [
            'banner_subtitle' => $request->input('banner_subtitle'),
            'banner_title' => $request->input('banner_title'),
            'banner_button_text' => $request->input('banner_button_text'),
            'banner_link' => $request->input('banner_link'),
        ];

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $originalName = $image->getClientOriginalName();
            $imageName = uniqid() . "_" . $originalName;

            $image->move(public_path('banners'), $imageName);
            $path = 'public/banners/' . $imageName;

            $data['banner_image'] = $path;
        }

        $updated = DB::table('t_banners')
            ->where('id', 1)
            ->update($data);

        if ($updated) {
            return response()->json([
                "status" => "success",
                "message" => "Banner updated successfully!"
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Banner could not be updated or no changes made!"
            ]);
        }
    }

    public function updateHotBannerProcess(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "banner_subtitle1" => "required|string",
            "banner_title1" => "required|string",
            "banner_button_text1" => "required|string",
            "banner_link1" => "required|string",
            "banner_image1" => "nullable|image",
        ]);

        if ($validation->fails()) {
            return response()->json([
                "status" => "error",
                "error" => $validation->errors()
            ]);
        }

        $data = [
            'banner_subtitle' => $request->input('banner_subtitle1'),
            'banner_title' => $request->input('banner_title1'),
            'banner_button_text' => $request->input('banner_button_text1'),
            'banner_link' => $request->input('banner_link1'),
        ];

        if ($request->hasFile('banner_image1')) {
            $image = $request->file('banner_image1');
            $originalName = $image->getClientOriginalName();
            $imageName = uniqid() . "_" . $originalName;

            $image->move(public_path('banners'), $imageName);
            $path = 'public/banners/' . $imageName;

            $data['banner_image'] = $path;
        }

        $updated = DB::table('t_banners')
            ->where('id', 2)
            ->update($data);

        if ($updated) {
            return response()->json([
                "status" => "success",
                "message" => "Banner updated successfully!"
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Banner could not be updated or no changes made!"
            ]);
        }
    }


    public function updateSaleBannerProcess(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "banner_subtitle2" => "required|string",
            "banner_title2" => "required|string",
            "banner_button_text2" => "required|string",
            "banner_link2" => "required|string",
            "banner_image2" => "nullable|image",
        ]);

        if ($validation->fails()) {
            return response()->json([
                "status" => "error",
                "error" => $validation->errors()
            ]);
        }

        $data = [
            'banner_subtitle' => $request->input('banner_subtitle2'),
            'banner_title' => $request->input('banner_title2'),
            'banner_button_text' => $request->input('banner_button_text2'),
            'banner_link' => $request->input('banner_link2'),
        ];

        if ($request->hasFile('banner_image2')) {
            $image = $request->file('banner_image2');
            $originalName = $image->getClientOriginalName();
            $imageName = uniqid() . "_" . $originalName;

            $image->move(public_path('banners'), $imageName);
            $path = 'public/banners/' . $imageName;

            $data['banner_image'] = $path;
        }

        $updated = DB::table('t_banners')
            ->where('id', 3)
            ->update($data);

        if ($updated) {
            return response()->json([
                "status" => "success",
                "message" => "Banner updated successfully!"
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Banner could not be updated or no changes made!"
            ]);
        }
    }
}
