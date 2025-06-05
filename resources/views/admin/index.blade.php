@extends("admin.layout.layout")
@section("content")

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Dashboard</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <a href="{{ route('admin.products') }}">
                    <div class="info-box border border-brown">
                        <span class="info-box-icon bg-cream"><i class="fa-solid fa-grip"></i></span>
                        <div class="info-box-content">
                            <h5 class="info-box-text m-0 text-brown">Total Products</h5>
                            <h2 class="info-box-number m-0">{{$productCount}}</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                <a href="{{ route('admin.orders') }}">
                    <div class="info-box border border-brown">
                        <span class="info-box-icon bg-cream"><i class="fa-solid fa-cart-shopping"></i></span>
                        <div class="info-box-content">
                            <h5 class="info-box-text m-0 text-brown">Total Orders</h5>
                            <h2 class="info-box-number m-0">{{$orderCount}}</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                <a href="{{ route('admin.orders') }}">
                    <div class="info-box border border-brown">
                        <span class="info-box-icon bg-cream"><i class="fa-solid fa-indian-rupee-sign"></i></span>
                        <div class="info-box-content">
                            <h5 class="info-box-text m-0 text-brown">Total Online Payments</h5>
                            <h2 class="info-box-number m-0">{{$totalOnlinePayments}}</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                <a href="{{ route('admin.bulkRateEnquiry') }}">
                    <div class="info-box border border-brown">
                        <span class="info-box-icon bg-cream"><i class="fa-brands fa-google-wallet"></i></span>
                        <div class="info-box-content">
                            <h5 class="info-box-text m-0 text-brown">Total Bulk Request</h5>
                            <h2 class="info-box-number m-0">{{$bulkRequest}}</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                <a href="{{ route('admin.enquiry') }}">
                    <div class="info-box border border-brown">
                        <span class="info-box-icon bg-cream"><i class="fa-regular fa-address-book"></i></span>
                        <div class="info-box-content">
                            <h5 class="info-box-text m-0 text-brown">Total Enquiries</h5>
                            <h2 class="info-box-number m-0">{{$enquiryCount,}}</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                <a href="{{ route('admin.users') }}">
                    <div class="info-box border border-brown">
                        <span class="info-box-icon bg-cream"><i class="fa-solid fa-user"></i></span>
                        <div class="info-box-content">
                            <h5 class="info-box-text m-0 text-brown">Total Users</h5>
                            <h2 class="info-box-number m-0">{{$totalUsers}}</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                <a href="{{ route('admin.blogs') }}">
                    <div class="info-box border border-brown">
                        <span class="info-box-icon bg-cream"><i class="fa-solid fa-newspaper"></i></span>
                        <div class="info-box-content">
                            <h5 class="info-box-text m-0 text-brown">Total Blogs</h5>
                            <h2 class="info-box-number m-0">{{$totalBlogs}}</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                <a href="{{ route('admin.category') }}">
                    <div class="info-box border border-brown">
                        <span class="info-box-icon bg-cream"><i class="fa-solid fa-tags"></i></span>
                        <div class="info-box-content">
                            <h5 class="info-box-text m-0 text-brown">Total Categories</h5>
                            <h2 class="info-box-number m-0">{{$totalCategories}}</h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection