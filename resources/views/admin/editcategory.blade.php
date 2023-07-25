@extends('admin.layouts.template')

@section('page-title')
Add Category -Ecom
@endsection
@section('content')


<section class="container">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> Edit Category </h4>
     <!-- Basic Layout -->
     <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Category </h5>
                <small class="text-muted float-end">Category Info</small>
              </div>

          <div class="card-body">

            <form action="{{route('updatecategory')}}" method="POST">
                @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="categoryName" id="categoryName" value="{{$categories->categoryName}}" placeholder="Add New Category" />
                </div>
              </div>
              <input type="hidden" name="id" value="{{$categories->id}}">
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
