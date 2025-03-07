<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    public function login()
    {
        if (Session::has('user')) {
            return redirect()->route("admin.home");
        }
        return view("admin/login");
    }

    public function VerifyLogin(Request $request)
    {
        $result = [];
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->passes()) {
            $username = $request->input('username');
            $password = $request->input('password');

            $user = DB::table('t_user_login')
                ->where(function ($query) use ($username) {
                    $query->where('email', $username)
                        ->orWhere('username', $username);
                })
                ->first();

            if ($user) {
                if ($user->password == $password) {
                    if ($user->status == 1) {
                        Session::put('user', $user);
                        $result = [
                            "status" => "success",
                            "message" => "Login Successful!",
                            "user" => $user->username
                        ];
                        return response()->json($result);
                    } else {
                        $result = [
                            "status" => "error",
                            "message" => "Account deactivated!",
                        ];
                        return response()->json($result);
                    }
                } else {
                    $result = [
                        "status" => "error",
                        "message" => "Invalid credentials!",
                    ];
                    return response()->json($result);
                }

            } else {
                $result = [
                    "status" => "error",
                    "message" => "User not found."
                ];
                return response()->json($result);
                ;
            }
        } else {
            $result = [
                "status" => "error",
                "error" => $validator->errors()
            ];
            return response()->json($result);
        }
    }


    public function logout()
    {
        Session::forget('user');
        return redirect()->route('admin.home');
    }

}