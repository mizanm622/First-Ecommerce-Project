<?php
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
});

Route::controller(ClientController::class)->group(function(){

    Route::get('/category/{id}/{slug}','categoryPage')->name('category');
    Route::get('/single-product/{id}/{slug}','singleProduct')->name('singleproduct');
    Route::get('/add-to-cart','addToCart')->name('addtocart');
    Route::get('/check-out','checkOut')->name('checkout');
    Route::get('/user-profile','userProfile')->name('userprofile');
    Route::get('/new-release','newRelease')->name('newrelease');
    Route::get('/todays-deal','todaysDeal')->name('todaysdeal');
    Route::get('/customer-service','customerService')->name('customerservice');
});

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth','role:admin'])->name('dashboard');

Route::middleware(['auth','role:user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth','role:admin')->group(function(){

    //Dashboard controller routes
    Route::controller(DashboardController::class)->group(function(){

        Route::get('/admin/dashboard', 'index')->name('admindashboard');

    });

     //Category controller routes
     Route::controller(CategoryController::class)->group(function(){

        Route::get('/admin/all-category', 'index')->name('allcategory');
        Route::get('/admin/add-category', 'addCategory')->name('addcategory');
        Route::post('/admin/store-category', 'storeCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'editcategory')->name('editcategory');
        Route::post('/admin/update-category', 'updateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'deleteCategory')->name('deletecategory');



    });

     //Sub Category controller routes
     Route::controller(SubCategoryController::class)->group(function(){

        Route::get('/admin/all-subcategory', 'index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'addSubcategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory', 'storeSubcategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'editSubcategory')->name('editsubcategory');
        Route::post('/admin/update-subcategory', 'updateSubcategory')->name('updatesubcategory');
        Route::get('/admin/delete-subcategory/{id}/{categoryName}', 'deleteSubcategory')->name('deletesubcategory');

    });

     //Product controller routes
     Route::controller(ProductController::class)->group(function(){

        Route::get('/admin/all-product', 'index')->name('allproduct');
        Route::get('/admin/add-product', 'addProduct')->name('addproduct');
        Route::post('/admin/store-product', 'storeProduct')->name('storeproduct');
        Route::get('/admin/edit-product-img/{id}', 'editProductimg')->name('editimage');
        Route::post('/admin/update-product-img', 'updateProductimg')->name('updateproductimg');
        Route::get('/admin/edit-product/{id}', 'editProduct')->name('editproduct');
        Route::post('/admin/update-product', 'updateProduct')->name('updateproduct');
        Route::get('/admin/delete-product/{id}/{productCategoryName}/{productSubcategoryName}', 'deleteProduct')->name('deleteproduct');


    });

     //Order controller routes
     Route::controller(OrderController::class)->group(function(){

        Route::get('/admin/pending-order', 'index')->name('pendingorder');
       // Route::get('/admin/add-order', 'addOrder')->name('addorder');

    });

});


require __DIR__.'/auth.php';
