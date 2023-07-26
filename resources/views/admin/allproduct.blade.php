@extends('admin.layouts.template')

@section('page-title')
All Product -Ecom
@endsection

@section('content')

<section class="container">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Page/</span> All Products</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
          <h5 class="card-header">Available Products Info <span><a class="btn btn-info" href="{{route('addproduct')}}">Add New</a></span></h5>

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
          <div class="table-responsive text-wrap">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product Quantity</th>
                  <th>Category Name</th>
                  <th>Sub Category Name</th>
                  <th>Short Description</th>
                  <th>Product Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($products as $product)


                <tr>
                    <td>{{$id=$product->id}}</td>
                    <td>{{$product->productName}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->productQuantity}}</td>
                    <td>{{$pcname=$product->productCategoryName}}</td>
                    <td>{{$psname=$product->productSubcategoryName}}</td>
                    <td>{{$product->productShortDescription}}</td>
                    <td class="text-center"><img src="{{asset($product->productImage)}}" alt="Image" width="40px"><br>
                     <a href="{{route('editimage',$product->id)}}:" class="btn btn-success">Update</a>
                    </td>
                    <td>
                        <a href="{{route('editproduct',$product->id)}}" class="btn btn-success">Edit</a> | <a href="{{route('deleteproduct',[$id,$pcname,$psname])}}" onclick="return confirm('Are you sure?')" class="btn btn-warning">Delete</a>
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
