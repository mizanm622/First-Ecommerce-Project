@extends('admin.layouts.template')

@section('page-title')
All Subcategory -Ecom
@endsection

@section('content')


<section class="container">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Page/</span> All Subcategory </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
          <h5 class="card-header">Available Subcategory Info  <span><a class="btn btn-info " href="{{route('addsubcategory')}}">Add New</a></span></h5>
          @if(session()->has('insert'))
          <div class="text-center alert alert-success">
              {{session()->get('insert')}}
           </div>
           @endif
            @if(session()->has('update'))
           <div class="text-center alert alert-info">
              {{session()->get('update')}}
           </div>
           @endif
           @if(session()->has('delete'))
           <div class="text-center alert alert-danger">
              {{session()->get('delete')}}
           </div>
           @endif

          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Subcategory Name</th>
                  <th>Category Name</th>
                  <th>Product</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($subcategories as $subcategory )
                <tr>
                    <td>{{$id=$subcategory->id}}</td>
                    <td>{{$subcategory->subcategoryName}}</td>
                    <td>{{$name=$subcategory->categoryName}}</td>
                    <td>{{$subcategory->productCount}}</td>
                    <td>

                        <a href="{{route('editsubcategory',$subcategory->id)}}" class="btn btn-success">Edit</a> | <a href="{{route('deletesubcategory',[$id , $name])}}"  class="btn btn-warning">Delete</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
        <!--/ Basic Bootstrap Table -->
</section>
@endsection
