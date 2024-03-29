@extends('home.layouts.template')

@section('page-title')
Home -Ecom
@endsection

@section('main-content')


   <!-- fashion section start -->
   <div class="fashion_section">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
          <div class="carousel-item active">
             <div class="container">
                <h1 class="fashion_taital">All Products</h1>
                <div class="fashion_section_2">
                   <div class="row">

                    @foreach ($allproducts as $allproduct )

                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">{{$allproduct->productName}}</h4>
                            <p class="price_text">Price  <span style="color: #262626;">BDT {{$allproduct->price}}/- Taka</span></p>
                            <div class="tshirt_img"><img style="height:250px" src="{{asset($allproduct->productImage)}}"></div>
                            <div class="btn_main">
                                <form action="{{route('addproducttocart')}}" method="post">
                                 @csrf
                                <input type="hidden" value="{{$allproduct->id}}" name="productId">
                                <input type="hidden" value="{{$allproduct->price}}" name="price">
                                <input type="hidden" value="1" name="productQuantity">
                                <div class="buy_bt"><input type="submit" class="btn btn-warning" value="Buy Now"></div>
                               </form>
                               <div class="seemore_bt">  <button class="btn btn-info"><a  href="{{route('singleproduct',[$allproduct->id, $allproduct->slug])}}">See More</a> </button></div>
                           </div>
                         </div>
                      </div>
                      @endforeach

                      {{-- <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Man -shirt</h4>
                            <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                            <div class="tshirt_img"><img src="{{asset('home/images/dress-shirt-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Woman Scart</h4>
                            <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                            <div class="tshirt_img"><img src="{{asset('home/images/women-clothes-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div> --}}
                   </div>
                </div>
             </div>
          </div>
          {{-- <div class="carousel-item">
             <div class="container">

                <h1 class="fashion_taital">Man & Woman Fashion</h1>
                <div class="fashion_section_2">
                   <div class="row">


                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Man T -shirt</h4>
                            <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                            <div class="tshirt_img"><img src="{{asset('home/images/tshirt-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>

                      <!--

                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Man -shirt</h4>
                            <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                            <div class="tshirt_img"><img src="{{asset('home/images/dress-shirt-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Woman Scart</h4>
                            <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                            <div class="tshirt_img"><img src="{{asset('home/images/women-clothes-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                    -->

                   </div>
                </div>
             </div>
          </div> --}}

          {{-- <div class="carousel-item">
             <div class="container">
                <h1 class="fashion_taital">Man & Woman Fashion</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Man T -shirt</h4>
                            <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                            <div class="tshirt_img"><img src="{{asset('home/images/tshirt-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Man -shirt</h4>
                            <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                            <div class="tshirt_img"><img src="{{asset('home/images/dress-shirt-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Woman Scart</h4>
                            <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                            <div class="tshirt_img"><img src="{{asset('home/images/women-clothes-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div> --}}

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
 <!-- electronic section start -->
 <div class="fashion_section">
    <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
          <div class="carousel-item active">
             <div class="container">
                <h1 class="fashion_taital">Electronic</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Laptop</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home/images/laptop-img.png')}}"  class="img-responsive" alt="Logo"  height="300px"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Mobile</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home/images/mobile-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Computers</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home/images/computer-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="carousel-item">
             <div class="container">
                <h1 class="fashion_taital">Electronic</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Laptop</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home/images/laptop-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Mobile</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home/images/mobile-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Computers</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home/images/computer-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="carousel-item">
             <div class="container">
                <h1 class="fashion_taital">Electronic</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Laptop</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home/images/laptop-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Mobile</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home/images/mobile-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Computers</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home/images/computer-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <a class="carousel-control-prev" href="#electronic_main_slider" role="button" data-slide="prev">
       <i class="fa fa-angle-left"></i>
       </a>
       <a class="carousel-control-next" href="#electronic_main_slider" role="button" data-slide="next">
       <i class="fa fa-angle-right"></i>
       </a>
    </div>
 </div>
 <!-- electronic section end -->
 <!-- jewellery  section start -->
 <div class="jewellery_section">
    <div id="jewellery_main_slider" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
          <div class="carousel-item active">
             <div class="container">
                <h1 class="fashion_taital">Jewellery Accessories</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Jumkas</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home/images/jhumka-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Necklaces</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home/images/neklesh-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Kangans</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home/images/kangan-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="carousel-item">
             <div class="container">
                <h1 class="fashion_taital">Jewellery Accessories</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Jumkas</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home/images/jhumka-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Necklaces</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home/images/neklesh-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Kangans</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home/images/kangan-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="carousel-item">
             <div class="container">
                <h1 class="fashion_taital">Jewellery Accessories</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Jumkas</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home/images/jhumka-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Necklaces</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home/images/neklesh-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Kangans</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home/images/kangan-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <a class="carousel-control-prev" href="#jewellery_main_slider" role="button" data-slide="prev">
       <i class="fa fa-angle-left"></i>
       </a>
       <a class="carousel-control-next" href="#jewellery_main_slider" role="button" data-slide="next">
       <i class="fa fa-angle-right"></i>
       </a>
       <div class="loader_main">
          <div class="loader"></div>
       </div>
    </div>
 </div>
 <!-- jewellery  section end -->
@endsection
