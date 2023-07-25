@extends('admin.layouts.template')

@section('page-title')
Edit Product Image -Ecom
@endsection

@section('content')


<section class="container">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> Update Product Image </h4>
     <!-- Basic Layout -->
     <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update Product Image</h5>
                <small class="text-muted float-end">Product Image Info</small>
              </div>

          <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{route('updateproductimg')}}" method="POST" enctype="multipart/form-data">
                @csrf


              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                <div class="col-sm-10">
                 <img src="{{asset($products->productImage)}}" alt="" width="100px">
                </div>
              </div>

              <input type="hidden" value="{{$products->id}}" name="id">


              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="productImage" id="productImage" placeholder="Upload Product Image" />
                </div>
              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update Image</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
