<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){

        $subcategories=Subcategory::all();
        return view('admin.allsubcategory', compact('subcategories'));
    }

    public function addSubcategory(){
        $categories=Category::latest()->get();

        return view('admin.addsubcategory', compact('categories'));
    }

    public function storeSubcategory(Request $request){

        $request->validate([
            'subcategoryName'=>'required|unique:sub_categories|max:255',
            'categoryId'=>'required',
            'categoryName'=>'required'
        ]);

        $categoryId=$request->categoryId;
        $categoryName=Category::where('id', $categoryId)->value('categoryName');

       SubCategory::insert([

            'subcategoryName' => $request->subcategoryName,
            'categoryName'=> $categoryName,
            'categoryId'=>$categoryId,
            'slug' => strtolower(str_replace(' ','_', $request->subcategoryName)),
        ]);

        Category::where('id', $categoryId)->increment('subcategoryCount',1);

        return redirect()->route('allsubcategory')->with('insert','Data Successfully Inserted');

    }

    public function editSubcategory($id){
        $subcategories=SubCategory::findorfail($id);

        return view('admin.editsubcategory', compact('subcategories'));



    }
    public function updateSubcategory(Request $request){
        $subcategory=$request->id;
        $request->validate([
            'subcategoryName'=>'required|unique:sub_categories|max:255'
        ]);

        SubCategory::findOrFail($subcategory)->update([
           'subcategoryName' => $request->subcategoryName,
            'slug' => strtolower(str_replace(' ','_', $request->subcategoryName)),
        ]);



       return redirect()->route('allsubcategory')->with('update','Data Successfully Updated');


    }
    public function deleteSubcategory($id, $categoryName){

        SubCategory::findorfail($id)->delete();

        Category::where('categoryName', $categoryName)->decrement('subcategoryCount',1);

        return redirect()->route('allsubcategory')->with('delete','Data Successfully Deleted');

    }
}
