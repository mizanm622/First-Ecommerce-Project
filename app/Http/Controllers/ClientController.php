<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\ShippingInfo;
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

public function shippingInfo(){

    return view('user.shippinginfo');
}

public function storeShippingInfo(Request $request){
    $request->validate([
        'phoneNumber'=>'required',
        'address'=>'required',
        'postalCode'=>'required'
    ]);

    ShippingInfo::insert([
         'userId'=>Auth::id(),
        'phoneNumber'=>$request->phoneNumber,
        'address'=>$request->address,
        'postalCode'=>$request->postalCode,

    ]);

    return redirect()->route('checkout')->with('msg','Shipping Address Successfully Inserted');


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
    $userId=Auth::id();
    $cartitems=Cart::where('userId', $userId)->latest()->get();
    $shipaddress=ShippingInfo::where('userId', $userId)->first();

    return view('user.checkout', compact('cartitems','shipaddress'));
}

public function placeOrder(){

    $userId=Auth::id();

    $cartitems=Cart::where('userId', $userId)->latest()->get();
    $shipaddress=ShippingInfo::where('userId', $userId)->first();

    foreach($cartitems as $items){
        OrderDetails::insert([
            'userId'=> $userId,
            'productId'=>$items->productId,
            'productQuantity'=>$items->productQuantity,
            'totalPrice'=>$items->price,
            'phone'=> $shipaddress->phoneNumber,
            'address'=> $shipaddress->address,
            'orderStatus'=>'0',
            'dateTime'=>date('Y-m-d'),

        ]);
        Cart::findorfail($items->id)->delete();
    }
    ShippingInfo::where('userId', $userId)->delete();

   return redirect()->route('pendingorders')->with('msg','Order has been placed Successfully');

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
