@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Blogs</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Blogs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <a href="{{ route('admin.addBlog') }}" class="float-right btn btn-brown"><i class="fas fa-add mr-2"></i> Add Blog</a>
            </div>
        </div>
        <div class="card card-outline-brown">
            <div class="card-header bg-cream">
                <h5 class="mb-0">
                    <span>
                        Blogs
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered dataTable">
                    <thead class="bg-grey">
                        <tr>
                            <th width="120">S.No</th>
                            <th width="100">Image</th>
                            <th>Title</th>
                            <th width="180">Category</th>
                            <th width="180">Created At</th>
                            <th width="160">Status</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td class="py-1">
                                    <img src="{{ url($blog->feature_image) }}" width="40" alt="{{ $blog->title }}">
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->category_name }}</td>
                                <td>{{ $blog->created_at }}</td>
                                <td>
                                    @switch($blog->status)
                                        @case(1)
                                            Active
                                        @break

                                        @case(2)
                                            Inactive
                                        @break

                                        @case(3)
                                            Draft
                                        @break

                                        @default
                                            Inactive
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('admin.editBlog, $blog->id) }}" class="btn btn-sm btn-light border border-primary text-primary"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
