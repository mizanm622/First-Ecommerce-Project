@extends('home.layouts.template')

@section('page-title')
Product -Ecom
@endsection

@section('main-content')
<section class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-4">
            <div class="box_main">

               <div class="tshirt_img"><img class="img-responsive" src="{{asset($products->productImage)}}"></div>

            </div>
         </div>
        <div class="col-lg-8 col-sm-8">
            <div class="box_main ">
               <h4 class="shirt_text text-left">{{$products->productName}}</h4>
               <p class="price_text text-left">Price  <span style="color: #262626;"> BDT {{$products->price}}/-</span></p>
               <p class="text-left p-0">{{$products->productLongDescription}} Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum dolorem recusandae inventore ad adipisci cupiditate doloremque suscipit! Voluptas, ex dolores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni odio corporis impedit quasi ab nobis totam at voluptates? Blanditiis, atque.</p>
               <ol>
                <li>Category: {{$products->productCategoryName}}</li>
                <li>Sub Category: {{$products->productSubcategoryName}}</li>
                <li>Available Quantity: ({{$products->productQuantity}})</li>
               </ol>

               <div class="btn_main my-3">
                  <div><a class="btn btn-warning" href="#">Add To Cart</a></div>

               </div>
            </div>
         </div>
    </div>
</section>
@endsection
