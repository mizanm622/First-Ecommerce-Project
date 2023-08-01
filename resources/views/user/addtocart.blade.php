@extends('home.layouts.template')

@section('page-title')
Cart -Ecom
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="box_main ">
                @if(session()->has('msg'))
                <div class="text-center alert alert-success">
                    {{session()->get('msg')}}
                 </div>
                 @endif
                <table class="table">
                    <div>
                        <a class="btn btn-primary" href="{{route('home')}}">Continue Shopping ?</a>
                    </div>
                    <thead class="thead-dark">
                        <tr>

                            <th scope="col">Index</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal=0;
                            $i=0;
                        @endphp
                        @foreach ($cartitems as  $item )
                        @php
                                  $productNameImage=App\Models\Product::where('id',$item->productId)->latest()->get();
                        @endphp
                        <tr>
                            <th scope="row">{{$i=$i+1;}}</th>
                            @foreach ($productNameImage as  $product)
                            <td>{{$product->productName}}</td>
                            <td><img src="{{asset($product->productImage)}}" alt="Logo" width="50px"></td>
                            @endforeach
                            <td>{{$item->price/$item->productQuantity}}/-</td>
                            <td>{{$item->productQuantity}}</td>
                            <td>{{$item->price}}/-</td>
                            <td> <a class="btn btn-warning" href="{{route('removeitem',$item->id)}}">Remove</a></td>

                            @php
                            $subtotal=$subtotal+$item->price;
                            @endphp

                        </tr>
                        @endforeach
                        @if ($subtotal!=0)
                        <tr>
                            <td></td><td></td><td></td><td></td><td>Sub Total=</td><td>{{$subtotal}}/-</td><td><a class="btn btn-info" href="{{route('shippinginfo')}}">Check Out Now!</a></td>
                        </tr>
                        @else
                        <tr>
                            <td></td><td></td><td></td><td class="text-center h3 fw-bold">Product Not Found!</td>

                        </tr>


                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
