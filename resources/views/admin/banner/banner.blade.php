@extends("admin.layout.layout")
@section("content")

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Banners</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Banners</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-grey">
                <h5 class="mb-0">Banners</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered dataTable">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($banners as $banner)
                            <tr>
                                <td>{{$i}}</td>
                                <td><img src="{{url($banner->banner_image)}}" class="img-fluid"></td>
                                <td>{{$banner->banner_title}}</td>
                                <td>{{$banner->banner_subtitle}}</td>
                                <td><a href="{{ $banner->banner_link }}" class="btn btn-sm btn-primary">{{$banner->banner_button_text}}</a></td>
                                <td>
                                    @switch($banner->status)
                                        @case(1)
                                            Active
                                            @break
                                    
                                        @default
                                            Inactive
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('admin.editBanner', $banner->id) }}"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection