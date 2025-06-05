@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Enquiries</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Enquiries</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Enquiry List</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered dataTable">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($enquiries as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->message }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="#" data-id="{{ $item->id }}"
                                    class="btn btn-light text-danger border border-danger delete-btn"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @php $i++; @endphp
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.delete-btn', function() {
            var EnquiryId = $(this).data('id');
            var isConfirmed = confirm("Are you sure you want to delete this Enquiry?");
            if (isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/deleteEnquiry') }}/" + EnquiryId,
                    success: function(data) {
                        if (data.status == "success") {
                            Swal.fire({
                                icon: data.status,
                                title: data.message
                            }).then(() => {
                                window.location.reload();
                            })
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
