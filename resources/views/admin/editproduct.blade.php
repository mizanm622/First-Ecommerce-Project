@extends('admin.layouts.template')

@section('page-title')
Update Product -Ecom
@endsection

@section('content')


<section class="container">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> Update Product </h4>
     <!-- Basic Layout -->
     <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update Product </h5>
                <small class="text-muted float-end">Update Product Info</small>
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
            <form action="{{route('updateproduct')}}" method="POST" enctype="multipart/form-data">
                @csrf

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="productName" id="productName" value="{{$products->productName}}" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="Price" id="Price" value="{{$products->price}}" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="productQuantity" id="productQuantity" value="{{$products->productQuantity}}" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short Description</label>
                <div class="col-sm-10">
                 <textarea class="form-control" name="productShortDescription" id="productShortDescription" cols="30" rows="10">{{$products->productShortDescription}}</textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
                <div class="col-sm-10">
                 <textarea class="form-control" name="productLongDescription" id="productLongDescription" cols="30" rows="10">{{$products->productLongDescription}}</textarea>
                </div>
              </div>
              <input type="hidden" value="{{$products->id}}" name="id">

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
