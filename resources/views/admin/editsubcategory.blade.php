@extends('admin.layouts.template')

@section('page-title')
Add Subcategory -Ecom
@endsection

@section('content')

<section class="container">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> Add Subcategory </h4>
     <!-- Basic Layout -->
     <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add New Subcategory </h5>
                <small class="text-muted float-end">Subcategory Info</small>
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
            <form action="{{route('updatesubcategory')}}" method="POST">
                @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Subcategory Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="subcategoryName" value="{{$subcategories->subcategoryName}}" id="subcategoryName" placeholder="Add New Category" />
                </div>
              </div>
              {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                <div class="col-sm-10">
                    <select name="categoryId" id="categoryId" class="form-select form-select-lg">
                        <option >Select any one</option>
                      @foreach ($subcategories as $subcategory)
                      <option value="{{$subcategory->id}}">{{$subcategory->subcategoryName}}</option>
                      @endforeach

                    </select>
                </div>
              </div> --}}
              <input type="hidden" value="{{$subcategories->id}}" name="id">
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update Subcategory</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
