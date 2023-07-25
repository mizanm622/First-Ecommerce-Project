<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories=Category::latest()->get();
        return view('admin.allcategory', compact('categories'));
    }

    public function addCategory(){

        return view('admin.addcategory');
    }

    public function storeCategory(Request $request){
        $request->validate([
            'categoryName'=>'required|unique:categories|max:255'
        ]);

        Category::insert([

            'categoryName' => $request->categoryName,
            'slug' => strtolower(str_replace(' ','_', $request->categoryName)),
        ]);

        return redirect()->route('allcategory')->with('insert','Data Successfully Inserted');
    }

    public function editCategory($id){
        $categories=Category::findorfail($id);

        return view('admin.editcategory', compact('categories'));



    }

    public function updateCategory(Request $request){
        $category=$request->id;
        $request->validate([
            'categoryName'=>'required|unique:categories|max:255'
        ]);

        Category::findOrFail($category)->update([
           'categoryName' => $request->categoryName,
            'slug' => strtolower(str_replace(' ','_', $request->categoryName)),
        ]);



       return redirect()->route('allcategory')->with('update','Data Successfully Updated');


    }

    public function deleteCategory($id){

        Category::findorfail($id)->delete();
        return redirect()->route('allcategory')->with('delete','Data Successfully Deleted');

    }

}
