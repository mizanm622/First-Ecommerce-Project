<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ClientController extends Controller
{
   public function categoryPage($id,$slug){
    $categories=Category::findorfail($id);
    $allproducts=Product::where('productCategoryId',$id)->latest()->get();

    return view('user.category',compact('categories','allproducts'));
   }

   public function singleProduct($id){
    $products=Product::findorfail($id); //get single product from product table
    $productsubcatid=Product::where('id',$id)->value('producSubcategoryId'); //get sub cat id from product table
    $getallsubcatproduct=Product::where('producSubcategoryId',$productsubcatid)->latest()->get(); // get all sub cat related product to display the              single product table as a related poduct.


    return view('user.product', compact('products','getallsubcatproduct'));
}

   public function addToCart(){

    return view('user.addtocart');
}

   public function checkOut(){
    return view('user.checkout');
}

   public function userProfile(){
    return view('user.userprofile');
}

public function newRelease(){
    return view('user.newrelease');
}
public function todaysDeal(){
    return view('user.todaysdeal');
}
public function customerService(){
    return view('user.customerservice');
}


}
