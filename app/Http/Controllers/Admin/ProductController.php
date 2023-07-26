<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products=Product::latest()->get();
        return view('admin.allproduct',compact('products'));
    }

    public function addProduct(){
        $categoris=Category::latest()->get();
        $subcategoris=SubCategory::latest()->get();


        return view('admin.addproduct',compact('categoris','subcategoris'));
    }

    public function storeProduct(Request $request){

        $categoryId=$request->productCategoryId;
        $subcategoryId=$request->productSubcategoryId;

        $categoryName=Category::where('id',$categoryId)->value('categoryName');
        $subcategoryName=SubCategory::where('id',$subcategoryId)->value('subcategoryName');

        $request->validate([
            'productName'=>'required|unique:products|max:255',
                  'Price'=>'required',
        'productQuantity'=>'required',
'productShortDescription'=>'required',
 'productLongDescription'=>'required',
     'productCategoryId' =>'required',
  'productSubcategoryId' =>'required',
          'productImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);




        $image=$request->file('productImage');
        $imgName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        $request->productImage->move(public_path('image'),$imgName);
        $imgurl='image/'.$imgName;



        Product::insert([

                        'productName' => $request->productName,
                              'price' => $request->Price,
                    'productQuantity' => $request->productQuantity,
            'productShortDescription' => $request->productShortDescription,
             'productLongDescription' => $request->productLongDescription,
                'productCategoryName' => $categoryName,
             'productSubcategoryName' => $subcategoryName,
                  'productCategoryId' => $request->productCategoryId,
               'producSubcategoryId' => $request->productSubcategoryId,
                       'productImage' => $imgurl,
                               'slug' => strtolower(str_replace(' ','_', $request->productName)),
        ]);

        Category::where('categoryName', $categoryName)->increment('productCount',1);
        SubCategory::where('subcategoryName', $subcategoryName)->increment('productCount',1);

        return redirect()->route('allproduct')->with('insert','Data Successfully Inserted');


    }
    public function editProduct($id){

        $products=Product::findOrFail($id);

        return view('admin.editproduct',compact('products'));


        }

        public function updateProduct(Request $request){
            $id=$request->id;

            $request->validate([
                'productName'=>'required|unique:products|max:255',
                      'Price'=>'required',
            'productQuantity'=>'required',
    'productShortDescription'=>'required',
     'productLongDescription'=>'required',
            ]);

            $value=Product::findorfail($id)->update([

                'productName' => $request->productName,
                      'price' => $request->Price,
            'productQuantity' => $request->productQuantity,
    'productShortDescription' => $request->productShortDescription,
     'productLongDescription' => $request->productLongDescription,
                       'slug' => strtolower(str_replace(' ','_', $request->productName)),
]);



return redirect()->route('allproduct')->with('update','Data Successfully Updated');


        }







    public function editProductimg($id){
        $products=Product::findOrFail($id);

        return view('admin.editproductimg',compact('products'));
    }

    public function updateProductimg(Request $request){

        $id=$request->id;
        $request->validate([
          'productImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $image=$request->file('productImage');
        $imgName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        $request->productImage->move(public_path('image'),$imgName);
        $imgurl='image/'.$imgName;


        $imagepath= Product::findorfail($id); //use id to get image path from db
        unlink($imagepath->productImage); // unlink or remove image from public image folder
        $imagepath->update([
            'productImage' => $imgurl,
        ]);

        return redirect()->route('allproduct')->with('insert','Image Successfully Updated');


    }

    public function deleteProduct($id,$pcname,$psname){

        $imagepath=Product::findorfail($id);
        unlink( $imagepath->productImage);
        $imagepath->delete();

        Category::where('categoryName',$pcname)->decrement('productCount',1);
        SubCategory::where('subcategoryName',$psname)->decrement('productCount',1);
        return redirect()->route('allproduct')->with('delete','Product Successfully Deleted');


    }
}
