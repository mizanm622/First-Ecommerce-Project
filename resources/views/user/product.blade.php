@extends('home.layouts.template')

@section('page-title')
Product -Ecom
@endsection

@section('main-content')


<section class="container">
        <div class="row ">
            <div class="col-lg-2 col-sm-2">

            </div>
                 <div class="col-lg-8 col-sm-8 ">
                        <div class="box_main ">
                            <div class="shirt_text"><img style="height:300px" class="img-thumbnail rounded" src="{{asset($products->productImage)}}"></div>
                            <h4 class="shirt_text text-center">{{$products->productName}}</h4>
                            <p class="price_text text-center mb-2">Price  <span style="color: #262626;"> BDT {{$products->price}}/- Taka</span></p>
                            <p class="price_text text-left">Product Description: <span style="color: #262626;"> {{$products->productLongDescription}} Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum dolorem recusandae inventore ad adipisci cupiditate doloremque suscipit! Voluptas, ex dolores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni odio corporis impedit quasi ab nobis totam at voluptates? Blanditiis, atque.</span></p>
                            <ol>
                                <li class="price_text text-left" >Category: <span style="color: #262626;"> {{$products->productCategoryName}}</span></li>
                                <li class="price_text text-left">Sub Category: <span style="color: #262626;"> {{$products->productSubcategoryName}}</span></li>
                                <li class="price_text text-left">Available Quantity: <span style="color: #262626;"> ({{$products->productQuantity}})</span></li>
                            </ol>

                            <div class="btn_main my-3">
                                <div><a class="btn btn-warning" href="#">Add To Cart</a></div>

                            </div>
                        </div>
                 </div>
                 <div class="col-lg-2 col-sm-2">

                </div>
            </div>
    </div>

    <div class="fashion_section">
        <div class="container">
            <div class="row">
            <h4 class="shirt_text text-center">Related Products</h4>
                <div class="fashion_section_2">
                    <div class="row ">
                        @foreach ($getallsubcatproduct as $products)
                            <div class="col-lg-4 col-sm-4 m-auto">
                                    <div class="box_main">
                                            <h4 class="shirt_text">{{ $products->productName}}</h4>
                                            <p class="price_text">Price  <span style="color: #262626;">BDT {{ $products->price}}/- Taka</span></p>
                                            <div class="tshirt_img"><img style="height:250px" src="{{asset($products->productImage)}}"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                                <div class="seemore_bt"><a href="{{route('singleproduct',[$products->id, $products->slug])}}">See More</a></div>
                                            </div>
                                    </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
