<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    $userId=Auth::id();
    $cartitems=Cart::where('userId', $userId)->latest()->get();

    return view('user.addtocart',compact('cartitems'));
}

public function removeCartItem($id){
    Cart::where('id',$id)->delete();
    return redirect()->route('addtocart')->with('msg','Product Successfully Removed');
}

public function addProductToCart(Request $request){
    $quantity=$request->productQuantity;
    $price=$request->price;

    $totalprice=$quantity*$price;

    Cart::insert([

        'productId'=>$request->productId,
        'userId'=>Auth::id(),
        'price'=>$totalprice,
        'productQuantity'=>$request->productQuantity,
    ]);

    return redirect()->route('addtocart')->with('msg','Product Order Successfully Inserted');
}

   public function checkOut(){
    return view('user.checkout');
}

   public function userProfile(){
    return view('user.userprofile');
}

public function pendingOrders(){
    return view('user.pendingorder');
}

public function history(){
    return view('user.history');
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
