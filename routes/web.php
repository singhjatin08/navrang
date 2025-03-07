<?php

use App\Http\Controllers\admin\category\categoryController;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\admin\product\productController;
use App\Http\Controllers\main\productController as MainProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main/index');
});
Route::get('/about', function () {
    return view('main/about');
});
Route::get('/contact', function () {
    return view('main/contact');
});
Route::get("shop", [MainProductController::class, "shop"])->name("shop");
Route::get('/blogs', function () {
    return view('main/blogs');
});


Route::get("admin/login", [loginController::class, "login"])->name('admin.login');
Route::get('/admin/logout', [loginController::class, "logout"])->name("admin.logout");
Route::post('/admin/VerifyLogin', [loginController::class, "VerifyLogin"])->name("admin.VerifyLogin");


Route::middleware(['login'])->group(function () {

    Route::get('/admin', [homeController::class, "index"])->name("admin.home");

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
