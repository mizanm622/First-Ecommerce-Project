@extends('home.layouts.template')

@section('page-title')
Category -Ecom
@endsection

@section('main-content')



  <!-- fashion section start -->
  <div class="fashion_section">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
          <div class="carousel-item active">
             <div class="container">
                <h1 class="fashion_taital">{{$categories->categoryName}} <span>({{$categories->productCount== '0'?  'Product Not Found!': $categories->productCount}})</span></h1>
                <div class="fashion_section_2">
                   <div class="row">

                      @foreach ($allproducts as $allproduct)

                       <div class="col-lg-4 col-sm-4">
                            <div class="box_main">
                                <h4 class="shirt_text">{{$allproduct->productName}}</h4>
                                <p class="price_text">Price  <span style="color: #262626;">BDT {{$allproduct->price}}/- Taka</span></p>
                                <div class="tshirt_img"><img style="height:250px" src="{{asset($allproduct->productImage)}}"></div>
                                    <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="{{route('singleproduct',[$allproduct->id, $allproduct->slug])}}">See More</a></div>
                                    </div>
                            </div>
                        </div>
                      @endforeach
                   </div>
                </div>
             </div>
          </div>
       </div>
       <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
       <i class="fa fa-angle-left"></i>
       </a>
       <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
       <i class="fa fa-angle-right"></i>
       </a>
    </div>
 </div>
 <!-- fashion section end -->
@endsection
