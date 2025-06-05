 <?php

use App\Http\Controllers\admin\reviewsController;
use App\Http\Controllers\admin\bannerController;
use App\Http\Controllers\admin\blogsController;
use App\Http\Controllers\admin\category\categoryController;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\admin\orderController as AdminOrderController;
use App\Http\Controllers\admin\product\productController;
use App\Http\Controllers\main\blogsController as MainBlogsController;
use App\Http\Controllers\main\cartController;
use App\Http\Controllers\main\homeController as MainHomeController;
use App\Http\Controllers\main\orderController;
use App\Http\Controllers\main\productController as MainProductController;
use App\Http\Controllers\main\userSignupSigninControler;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainHomeController::class,"index"])->name("home"); 
Route::get('about',[MainHomeController::class,"about"])->name("about"); 
Route::get('contact', [MainHomeController::class,"contact"])->name('contact');
Route::post('sendEnquiry', [MainHomeController::class,"sendEnquiry"])->name("sendEnquiry");
Route::post('subscribeNow', [MainHomeController::class,"subscribeNow"])->name("subscribeNow");
Route::post('sendBulkRateEnquiry', [orderController::class,"bulkRateEnquiry"])->name("sendBulkRateEnquiry");



Route::get('blogs',[MainBlogsController::class,'blogs'])->name('blogs');
Route::get('blog/{slug}',[MainBlogsController::class,'blogDetail'])->name('blog.detail');
Route::get('blogs/{slug}',[MainBlogsController::class,'blogByCategory'])->name('blog.bycategory');

Route::get("shop", [MainProductController::class, "shop"])->name("shop");
Route::get("category/{category}", [MainProductController::class, "ProductByCategory"])->name("ProductByCategory");
Route::get("product-details/{pId}", [MainProductController::class,"ProductDetails"])->name("product-details");
Route::post('/submit-review', [MainProductController::class, 'submitReview'])->name('product.review.submit');

Route::get('/search', [MainProductController::class, 'search'])->name('product.search');

Route::get("bulk-rates", [MainProductController::class, "bulkRates"])->name("bulk-rates");

Route::get("cart",[cartController::class,"cart"])->name("cart");
Route::get("getCart",[cartController::class,"getCart"])->name("getCart");
Route::get("deleteCart{pId}",[cartController::class,"deleteCart"])->name("deleteCart");
Route::post("add-cart",[cartController::class,"addToCart"])->name("cart.add");
Route::post("remove-cart-quantity",[cartController::class,"reduceQuantity"])->name("cart.remove");

Route::get("checkout",[orderController::class,"checkout"])->name("checkout");
Route::post("orderProcess",[orderController::class,"orderProcess"])->name("orderProcess");
Route::post('/razorpay/verify', [OrderController::class, 'verifyPayment'])->name('razorpay.verify');
Route::post("razorpayCreateOrder",[orderController::class,"razorpayCreateOrder"])->name("razorpayCreateOrder");

Route::get('my-account', [userSignupSigninControler::class,"myAccount"])->name("my-account");
Route::get('my-account/order/{order_id}', [userSignupSigninControler::class,"viewOrderDetails"])->name("view-order");
Route::get('login', [userSignupSigninControler::class,"login"])->name("login");
Route::get('logout', [userSignupSigninControler::class,"logout"])->name("logout");
Route::post("loginProcess",[userSignupSigninControler::class,"loginProcess"])->name("loginProcess");
Route::get("signup",[userSignupSigninControler::class,"signup"])->name("signup");
Route::post("signupProcess",[userSignupSigninControler::class,"signupProcess"])->name("signupProcess");
Route::get("forget-password",[userSignupSigninControler::class,"forgetPassword"])->name("forgetPassword");
Route::post("forget-password",[userSignupSigninControler::class,"forgetPasswordProcess"])->name("process.forgetPassword");
Route::get("set-password/{token}/{username}",[userSignupSigninControler::class,"setPassword"])->name("setPassword");
Route::post("set-password/",[userSignupSigninControler::class,"setPasswordProcess"])->name("new.setPassword");








Route::get("admin/login", [loginController::class, "login"])->name('admin.login');
Route::get('/admin/logout', [loginController::class, "logout"])->name("admin.logout");
Route::post('/admin/VerifyLogin', [loginController::class, "VerifyLogin"])->name("admin.VerifyLogin");


Route::middleware(['adminCheck'])->group(function () {

    Route::get('/admin', [homeController::class, "index"])->name("admin.home");
    Route::get('admin/user', [homeController::class, "users"])->name("admin.users");
    Route::get('admin/enquiry', [homeController::class, "enquiry"])->name("admin.enquiry");
    Route::get('/admin/deleteEnquiry/{cID}', [homeController::class, "deleteEnquiry"]);
    
    Route::get('admin/meta-tags', [homeController::class, "metaTags"])->name("admin.metaTags");
    Route::post('admin/meta-tags', [homeController::class, "updateMetaTags"])->name("admin.updateMetaTags");

    Route::get('/admin/getAllCategory', [categoryController::class, "getAllCategory"])->name("admin.getAllCategory");
    Route::get('/admin/category', [categoryController::class, "category"])->name("admin.category");
    Route::post('/admin/addCategory', [categoryController::class, "addCategoryProcess"])->name("admin.addCategoryProcess");
    Route::get('admin/editCategory/{id}', [CategoryController::class, 'editCategory'])->name('admin.editCategory');
    Route::post('/admin/updateCategory/{cID}', [categoryController::class, "updateCategory"]);
    Route::get('/admin/deleteCategory/{cID}', [categoryController::class, "deleteCategory"]);

    
    //products
    Route::get('/admin/products', [productController::class, "products"])->name('admin.products');
    Route::get('/admin/addProduct', [productController::class, "addProduct"])->name('admin.addProduct');
    Route::get('/admin/deleteProduct/{id}', [productController::class, 'deleteProduct']);
    Route::post('/admin/addProductProcess', [productController::class, "addProductProcess"])->name('admin.addProductProcess');
    Route::get('/admin/updateProduct/{pID}', [productController::class, "updateProduct"])->name('admin.updateProduct');
    Route::post('/admin/updateProductProcess/{id}', [ProductController::class, 'updateProductProcess'])->name('admin.updateProductProcess');
    Route::get('/admin/deleteGalleryImage/{gID}', [productController::class, "deleteGalleryImage"]);


    //orders
    Route::get("/admin/orders", [AdminOrderController::class,"orders"])->name("admin.orders");
    Route::get("/admin/order/{order_id}", [AdminOrderController::class,"orderDetails"])->name('admin.order-details');
    Route::post('/admin/updateOrderSatus/{order_id}', [AdminOrderController::class,"updateStatus"])->name("updateOrderStatus");


    //Blogs
    Route::get("admin/blogs",[blogsController::class,"blogs"])->name("admin.blogs");
    Route::get("admin/addBlog",[blogsController::class,"addBlog"])->name("admin.addBlog");
    Route::post("admin/addBlogProcess",[blogsController::class,"addBlogProcess"])->name("admin.blogs.add");
    Route::get("admin/editBlog/{id}",[blogsController::class,"editBlog"])->name("admin.blog.edit");
    Route::post("admin/editBlogProcess/",[blogsController::class,"editBlogProcess"])->name("admin.blog.editBlogProcess");


    //banner
    Route::get("admin/banners",[bannerController::class,"banners"])->name("admin.banners");
    Route::get("admin/addBanner",[bannerController::class,"addBanner"])->name("admin.addBanner");
    Route::post("admin/addBannerProcess",[bannerController::class,"addBannerProcess"])->name("admin.addBannerProcess");
    Route::get("admin/editBanner/{id}",[bannerController::class,"editBanner"])->name("admin.editBanner");
    Route::post("admin/updateBannerProcess",[bannerController::class,"updateBannerProcess"])->name("admin.updateBannerProcess");
    Route::get('/admin/deleteBanner/{cID}', [bannerController::class, "deleteBanner"]);

    Route::post("admin/updateTrendBannerProcess",[bannerController::class,"updateTrendBannerProcess"])->name("admin.updateTrendBannerProcess");
    Route::post("admin/updateHotBannerProcess",[bannerController::class,"updateHotBannerProcess"])->name("admin.updateHotBannerProcess");
    Route::post("admin/updateSaleBannerProcess",[bannerController::class,"updateSaleBannerProcess"])->name("admin.updateSaleBannerProcess");


    //Bulk Rate Enquiry
    Route::get("admin/bulkRateEnquiry",[AdminOrderController::class,"bulkRateEnquiry"])->name("admin.bulkRateEnquiry");
    Route::get('/admin/deleteBulkEnquiry/{cID}', [AdminOrderController::class, "deleteBulkEnquiry"]);
    
    
    //Reviews
    Route::get('reviews', [reviewsController::class, "reviews"])->name("reviews");
    Route::get('loadPendingReviews', [reviewsController::class, "loadPendingReviews"])->name("loadPendingReviews");
    Route::get('loadApprovedReviews', [reviewsController::class, "loadApprovedReviews"])->name("loadApprovedReviews");
    Route::get('deleteReview/{gID}', [reviewsController::class, "deleteReview"])->name("deleteReview");
    Route::get('approveReview/{gID}', [reviewsController::class, "approveReview"])->name("approveReview");
});
