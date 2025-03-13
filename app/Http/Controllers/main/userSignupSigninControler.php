<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\user\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class userSignupSigninControler extends Controller
{

    public function myAccount(){
        return view("main/my-account");
    }

    public function signup(){
        return view("main/signup");
    }
    public function signupProcess(Request $request)
    {
        $result = [];
        $validation = Validator::make($request->all(), [
            'name' => "required|string",
            'phone' => "required|string",
            'email' => "required|string",
            'password' => "required|string",
        ]);
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $username = strtolower(preg_replace('/\s+/', '', $name)) . substr($phone, -4) . rand(100, 999);

        if ($validation->passes()) {

            $phoneExist = userModel::where("phone", $phone)->exists();
            if (!$phoneExist) {
                $emailExist = userModel::where("email", $email)->exists();
                if (!$emailExist) {
                    $data = [
                        'username' => $username,
                        'name' => $name,
                        'phone' => $phone,
                        'email' => $email,
                        'password' => md5($request->input('password')),
                        'status' => 1,
                    ];
                    // DB::table("t_users")->insertGetId()
                    $insert = userModel::insertGetId($data);
                    if ($insert) {
                        $result = [
                            "status" => "success",
                            "message" => "Signup Successfull!",
                            "data" => $insert
                        ];
                        return response()->json($result);
                    } else {
                        $result = [
                            "status" => "error",
                            "message" => "You could not signup!",
                            "data" => $data
                        ];
                        return response()->json($result);
                    }
                } else {
                    $result = [
                        "status" => "error",
                        "message" => "Email already registered!",
                    ];
                    return response()->json($result);
                }
            } else {
                $result = [
                    "status" => "error",
                    "message" => "Phone number already registered!",
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

    public function login(){
        return view("main/login");
    }
    public function loginProcess(Request $request)
    {
        $result = [];
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->passes()) {
            $username = $request->input('username');
            $password = $request->input('password');

            $user = DB::table('t_users')
                ->where(function ($query) use ($username) {
                    $query->where('email', $username)
                        ->orWhere('username', $username);
                })
                ->first();

            if ($user) {
                if ($user->password == md5($password)) {
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
                return response()->json($result);;
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
        return redirect()->route('home');
    }
}
