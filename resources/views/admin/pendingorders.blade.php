@extends('admin.layouts.template')

@section('page-title')
Order -Ecom
@endsection

@section('content')

<section class="container">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Page/</span> Available Orders Info</h4>
       @if (session()->has('msg'))
           <div class="alert alert-success">
            {{session()->get('msg')}}
           </div>
       @endif
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <h5 class="card-header"> Available New Pending Orders </h5>

          @php
          $subtotal=0;
          $i=0;
          $customerinfo=$pendingOrders->first();

          @endphp
          <div class="table-responsive text-wrap">
            <table class="table">
                @if (!empty($customerinfo))


                <thead>
                    <tr><th>User Id  :{{$customerinfo->userId}}</th></tr>
                    <tr><th>Address  :{{ $customerinfo->address}}</th></tr>
                    <tr><th>Phone No.:{{ $customerinfo->phone}}</th></tr>
                    <tr><th>Order Status :{!! $customerinfo->orderStatus=='0'? '<span class="text-danger">Pending</span>':'<span class="text-success">Shifted</span>' !!}</th></tr>
                </thead>
              <thead>
                <tr>
                  <th>Product Id</th>
                  <th>Product Price</th>
                  <th>Product Quantity</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">

                @php
                $subtotal=0;
                $i=0;

                @endphp
                @foreach ($pendingOrders as $order)

                @php
                     $productName=App\Models\Product::where('id',$order->productId)->value('productName');

                @endphp

                <tr>
                    <td>{{$productName}}</td>
                    <td>{{$order->totalPrice}}/-</td>
                    <td>{{$order->productQuantity}}</td>


                    @php
                        $subtotal=$subtotal+$order->totalPrice;
                    @endphp

                </tr>
                @endforeach
                <tr><td class="text-right m-auto">Subtotal=</td>
                    <td>{{$subtotal}}/-</td>
                    <td>
                        <form action="{{route('shiporder')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$customerinfo->userId}}" name="userId">
                            <input type="submit" class="btn btn-success" value="Place!" >
                        </form>
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" value="{{$customerinfo->userId}}" name="userId">
                            <input type="submit" class="btn btn-warning" value="Canceal" >
                        </form>
                    </td>
                </tr>
              </tbody>

              @endif
              @if (empty($customerinfo))

              <h2 class="alert alert-warning text-center my-3">Order Not Found!</h2>

              @endif

            </table>
            <table class="table">

            </table>


          </div>
        </div>
    </div>
        <!--/ Basic Bootstrap Table -->
</section>
@endsection
