<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\enquiryModel;
use App\Models\user\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class homeController extends Controller
{
    public function index()
    {
        $enquiryCount  = DB::table('t_enquiry')->count();
        $orderCount    = DB::table('t_orders')->count();
        $productCount  = DB::table('t_products')->where('status', 1)->count();
        $bulkRequest   = DB::table('t_bulk_enquiry')->count();
        $totalUsers = DB::table('t_users')->count();
        $totalBlogs = DB::table('t_blogs')->where('status',1)->count();
        $totalCategories = DB::table('t_category')->where('status',1)->count();
        $totalOnlinePayments = DB::table('t_orders')->whereNotNull('payment_id')->where('payment_status', 1)->count();

        
        
        return view("admin.index",[
            'enquiryCount'=>$enquiryCount,
            'orderCount'=>$orderCount,
            'productCount'=>$productCount,
            'bulkRequest'=>$bulkRequest,
            'totalUsers'=>$totalUsers,
            'totalBlogs'=>$totalBlogs,
            'totalCategories'=>$totalCategories,
            'totalOnlinePayments'=>$totalOnlinePayments
        ]);
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
    public function deleteEnquiry(Request $request, $cId)
    {
        $deleted = DB::table('t_enquiry')->where('id', '=', $cId)->delete();

        if ($deleted) {
            return response()->json([
                'status' => 'success',
                'message' => 'Enquiry deleted successfully!'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Enquiry could not be deleted!'
            ]);
        }
    }
    
    
    public function metaTags(){
        $meta = DB::table('t_meta_tags_and_scripts')
            ->first();
        return view("admin.meta",['meta'=>$meta]);
    }
    
    
    public function updateMetaTags(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "head_tags_and_scripts" => "required|string",
        ]);

        if ($validation->fails()) {
            return response()->json([
                "status" => "error",
                "error" => $validation->errors()
            ]);
        }

        $data = [
            'head_scripts' => $request->input('head_tags_and_scripts'),
            'body_scripts' => $request->input('body_tags_and_scripts'),
        ];

        
        $updated = DB::table('t_meta_tags_and_scripts')
            ->update($data);

        if ($updated) {
            return response()->json([
                "status" => "success",
                "message" => "Meta tags updated successfully!"
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Meta tags could not be updated or no changes made!"
            ]);
        }
    }
    
}
