@extends("admin.layout.layout")
@section("content")



<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="m-0 fw-bold">Confirm Deletion</span>
                    </div>
                    <div class="card-body">
                        <p>Are you sure you want to delete the product: <strong>{{ $product->product_title }}</strong>?</p>
                    </div>
                    <div class="card-footer">
                        <form method="POST" action="{{ url('/admin/deleteProductProcess/' . $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <a href="{{ url('/admin/products') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    $(document).ready(function() {
        $('form').submit(function(e) {
            if (!confirm('Are you sure you want to delete this product?')) {
                e.preventDefault();
            }
        });
    });
</script>

@endsection
