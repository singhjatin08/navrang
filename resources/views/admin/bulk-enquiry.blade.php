@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Bulk Rate Enquiry</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Bulk Rate Enquiry</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($enquiries as $enq)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $enq->product_id }}</td>
                                    <td>{{ $enq->name }}</td>
                                    <td>{{ $enq->phone }}</td>
                                    <td>{{ $enq->quantity }}</td>
                                    <td>
                                        @switch($enq->status)
                                            @case(2)
                                                Pending
                                            @break

                                            @case(1)
                                                Approved
                                            @break

                                            @default
                                                Pending
                                        @endswitch
                                    </td>
                                    <td>
                                        <button data-bulk-enq-id="{{ $enq->id }}" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fa fa-trash"></i>
                                        </button>
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
    </div>

    <script>
        $(document).on('click', '.delete-btn', function() {
                var enqID = $(this).data('bulk-enq-id');
                var isConfirmed = confirm("Are you sure you want to delete this Enquiry?");
                if (isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('admin/deleteBulkEnquiry') }}/" + enqID,
                        success: function(data) {
                            if (data.status == "success") {
                                Swal.fire({
                                    icon: data.status,
                                    title: data.message
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: data.status,
                                    title: data.message
                                })
                            }
                        },
                        error: function(error) {
                            console.log(error.responseJSON);
                        }
                    });
                } else {
                    return false;
                }
            });
    </script>
@endsection
