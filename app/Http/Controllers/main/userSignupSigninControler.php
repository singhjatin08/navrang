<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Mail\forgetUserPasswordEmail;
use App\Models\cartModel;
use App\Models\orderModel;
use App\Models\user\userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class userSignupSigninControler extends Controller
{

    public function myAccount()
    {
        if (Session::has("user")) {
            $orderModel = new orderModel();
            $orders = $orderModel->getOrderDetailbyUserID(Session::get("user")->username);
            return view("main.my-account", ['orders' => $orders]);
        } else {
            return view("main.my-account");
        }
    }

    public function viewOrderDetails($user_id)
    {
        $orderModel = new orderModel();
        $order = $orderModel->getOrderDetailbyID($user_id);
        return view('main.view-order-details', ['order' => $order]);
    }

    public function signup()
    {
        return view("main.signup");
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

    public function login()
    {
        return view("main.login");
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
                        $cookieCart = json_decode(Cookie::get('cart', '[]'), true);

                        // Check if cart is not empty
                        if (!empty($cookieCart)) {
                            foreach ($cookieCart as $item) {
                                if (!empty($item['product_id'])) {
                                    // Insert cart items into the database
                                    cartModel::create([
                                        'username' => Session::get('user')->username,
                                        'product_id' => $item['product_id'],
                                        'quantity' => $item['quantity'],
                                    ]);
                                }
                            }

                            // After processing the cart, clear the cookie
                            Cookie::queue(Cookie::forget('cart'));
                        }


                        $result = [
                            "status" => "success",
                            "message" => "Login Successful!",
                            "cart" => $cookieCart
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


    public function forgetPassword()
    {
        return view("main.forget-password");
    }

    public function forgetPasswordProcess(Request $request)
    {
        $result = [];
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
        ]);

        if ($validator->passes()) {
            $username = $request->input('username');

            $user = DB::table('t_users')
                ->where(function ($query) use ($username) {
                    $query->where('email', $username)
                        ->orWhere('username', $username);
                })
                ->first();

            if ($user) {



                if ($user->status == 1) {



                    $token = uniqid();
                    $name = $user->name;

                    DB::table('t_users')->where('username', $user->username)->update(['token' => $token]);

                    $url = url("set-password/" . $token . "/" . $user->username);
                    Mail::to($user->email)->send(new forgetUserPasswordEmail($name, $url));
                    $result = [
                        "status" => "success",
                        "message" => "Password reset link sent to your email!",
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

    public function setPassword($token, $username)
    {
        $user = DB::table('t_users')->where(['username' => $username, 'token' => $token])->first();
        if ($user) {
            return view("main.set-password", ['token' => $token,'username' => $username]);
        } else {
            return redirect()->route('login');
        }
    }
    public function setPasswordProcess(Request $request)
    {
        $result = [];
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|string',
            'confirm_password' => 'required|string',
            'token' => 'required|string',
            'username' => 'required|string',
        ]);

        if ($validator->passes()) {
            if($request->input('new_password') !== $request->input('confirm_password')){
                $result = [
                    "status" => "error",
                    "message" => "Password and confirm password do not match!",
                ];
                return response()->json($result);
            }
            $password = md5($request->input('new_password'));
            $token = $request->input('token');
            $username = $request->input('username');

            DB::table('t_users')->where(['username' => $username, 'token' => $token])->update(['password' => $password, 'token' => null]);
            $result = [
                "status" => "success",
                "message" => "Password updated successfully!",
            ];
            return response()->json($result);
        } else {
            $result = [
                "status" => "error",
                "error" => $validator->errors()
            ];
            return response()->json($result);
        }
    }
}
