<?php

use App\Http\Controllers\admin\category\categoryController;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\admin\product\productController;
use App\Http\Controllers\main\cartController;
use App\Http\Controllers\main\homeController as MainHomeController;
use App\Http\Controllers\main\orderController;
use App\Http\Controllers\main\productController as MainProductController;
use App\Http\Controllers\main\userSignupSigninControler;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainHomeController::class,"index"])->name("home");
Route::get('/about', function () {
    return view('main/about');
});
Route::get('contact', [MainHomeController::class,"contact"]);
Route::post('sendEnquiry', [MainHomeController::class,"sendEnquiry"])->name("sendEnquiry");


Route::get('/blogs', function () {
    return view('main/blogs');
});

Route::get("shop", [MainProductController::class, "shop"])->name("shop");
Route::get("product-details/{pId}", [MainProductController::class,"ProductDetails"])->name("product-details");


Route::get("cart",[cartController::class,"cart"])->name("cart");
Route::get("getCart",[cartController::class,"getCart"])->name("getCart");
Route::get("deleteCart{pId}",[cartController::class,"deleteCart"])->name("deleteCart");
Route::post("add-cart",[cartController::class,"addToCart"])->name("cart.add");
Route::post("remove-cart-quantity",[cartController::class,"reduceQuantity"])->name("cart.remove");

Route::get("checkout",[orderController::class,"checkout"])->name("checkout");
Route::post("orderProcess",[orderController::class,"orderProcess"])->name("orderProcess");


Route::get('my-account', [userSignupSigninControler::class,"myAccount"])->name("my-account");
Route::get('login', [userSignupSigninControler::class,"login"])->name("login");
Route::get('logout', [userSignupSigninControler::class,"logout"])->name("logout");
Route::post("loginProcess",[userSignupSigninControler::class,"loginProcess"])->name("loginProcess");
Route::get("signup",[userSignupSigninControler::class,"signup"])->name("signup");
Route::post("signupProcess",[userSignupSigninControler::class,"signupProcess"])->name("signupProcess");









Route::get("admin/login", [loginController::class, "login"])->name('admin.login');
Route::get('/admin/logout', [loginController::class, "logout"])->name("admin.logout");
Route::post('/admin/VerifyLogin', [loginController::class, "VerifyLogin"])->name("admin.VerifyLogin");

Route::middleware(['adminCheck'])->group(function () {

    Route::get('/admin', [homeController::class, "index"])->name("admin.home");
    Route::get('/user', [homeController::class, "users"])->name("admin.users");
    Route::get('/enquiry', [homeController::class, "enquiry"])->name("admin.enquiry");

    Route::get('/admin/getAllCategory', [categoryController::class, "getAllCategory"])->name("admin.getAllCategory");
    Route::get('/admin/category', [categoryController::class, "category"])->name("admin.category");
    Route::post('/admin/addCategory', [categoryController::class, "addCategoryProcess"])->name("admin.addCategoryProcess");
    Route::get('admin/editCategory/{id}', [CategoryController::class, 'editCategory'])->name('admin.editCategory');
    Route::post('/admin/updateCategory/{cID}', [categoryController::class, "updateCategory"]);
    Route::get('/admin/deleteCategory/{cID}', [categoryController::class, "deleteCategory"]);

    //products
    Route::get('/admin/products', [productController::class, "products"])->name('admin.products');
    Route::get('/admin/addProduct', [productController::class, "addProduct"])->name('admin.addProduct');
    Route::get('/admin/deleteProduct/{did}', [productController::class, 'deleteProduct'])->name('admin.deleteProduct');
    Route::post('/admin/addProductProcess', [productController::class, "addProductProcess"])->name('admin.addProductProcess');
    Route::get('/admin/updateProduct/{pID}', [productController::class, "updateProduct"])->name('admin.updateProduct');
    Route::post('/admin/updateProductProcess/{id}', [ProductController::class, 'updateProductProcess'])->name('admin.updateProductProcess');
    Route::get('/admin/deleteGalleryImage/{gID}', [productController::class, "deleteGalleryImage"]);


});
