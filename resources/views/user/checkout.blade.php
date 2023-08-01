@extends('home.layouts.template')

@section('page-title')
Ckeck Out -Ecom
@endsection

@section('main-content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="box_main ">
                <h3 class="text-left">Shipping Address</h3>
                <ol>
                    <li>Phone: {{$shipaddress->phoneNumber}}</li>
                    <li>Address: {{$shipaddress->address}}</li>
                    <li>Postal Code: {{$shipaddress->postalCode}}</li>
                    <li></li>
                </ol>

                <table class="table">

                    <thead class="thead-light">
                        <tr> <h3 class="text-left">Product List</h3></tr>
                        <tr>
                            <th scope="col">Index</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal=0;
                            $i=0;
                        @endphp
                        @foreach ($cartitems as  $item )
                        @php
                                  $productName=App\Models\Product::where('id',$item->productId)->first();
                        @endphp
                        <tr>
                            <th scope="row">{{$i=$i+1;}}</th>
                            <td>{{$productName->productName}}</td>
                            <td>{{$item->price/$item->productQuantity}}/-</td>
                            <td>{{$item->productQuantity}}</td>
                            <td>{{$item->price}}/-</td>
                            @php
                            $subtotal=$subtotal+$item->price;
                            @endphp

                        </tr>
                        @endforeach

                        <tr>
                            <td>
                                <form action="{{route('placeorder')}}" method="post">
                                    @csrf
                                <input class="btn btn-info" type="submit" value="Confirm!">
                                </form>

                            </td>
                            <td></td>
                            <td>
                                <form action="#" method="post">
                                    @csrf
                                <input class="btn btn-warning" type="submit" value="Cancel!">
                                </form>
                            </td>

                            <td>Sub Total=</td><td>{{$subtotal}}/-</td><td></td>
                        </tr>


                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>



@endsection
