<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\SellerAuthController;
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

Route::get('/',[HomeController::class,'Index'])->name('home');
Route::get('/buyer-login',[HomeController::class,'showLogin'])->name('buyer.login');
Route::get('/buyer-register',[HomeController::class,'showRegister'])->name('buyer.register');
Route::post('/buyer-auth', [HomeController::class, 'Login'])->name('buyer.auth');
Route::post('/buyer-registerstore', [HomeController::class, 'Register'])->name('buyer.registerstore');







Route::get('/seller-login',[SellerAuthController::class,'showlogin'])->name('seller.login');
Route::post('/seller-auth',[SellerAuthController::class,'login'])->name('seller.auth');
Route::get('/seller-register',[SellerAuthController::class,'showRegister'])->name('seller.register');
Route::post('/seller-registerstore', [SellerAuthController::class, 'register'])->name('seller.registerstore');

Route::get('/profile-show/{id}',[HomeController::class,'ShowProfile'])->name('profile.show');





Route::middleware('auth','role:buyer')->group(function () {
    Route::controller(BuyerController::class)->group(function(){
        Route::get('/cart/{id}','Cart')->name('cart');
        Route::post('/add-product-to-cart/{id}','AddProductToCart')->name('addproducttocart');
        Route::get('/my-cart','MyCart')->name('mycart');
        Route::get('/remove-cart-item/{id}','RemoveCartItem')->name('removeitem');
        Route::get('/productcategory/{id}', 'category')->name('productcategory');
        Route::get('/myproduct/{id}', 'MyProduct')->name('myproduct');
        Route::post('/rateproduct/{id}','RateProduct')->name('rateproduct');
        

        Route::get('/buyer-profile', 'showprofile')->name('buyer.profile');
        Route::get('buyer-profile-edit','editProfile')->name('buyer.edit');
        Route::post('/buyer-update','update')->name('buyerprofileupdate');
        Route::post('/checkout/{amount}', [PaymentController::class, 'createPayment'])->name('checkout.create');
        Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
        Route::get('/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');
        Route::get('/checkout-pro',[HomeController::class,'show'])->name('checkout');
        


    });
   
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth','role:seller')->group(function () {
    Route::controller(SellerController::class)->group(function(){
        Route::get('/seller-dashboard','Index')->name('sellerdashboard');
        Route::get('/seller-profile', 'showprofile')->name('seller.profile');
        
        
    });
    Route::controller(ProductController::class)->group(function(){
        Route::get('/seller-addproduct','AddProduct')->name('addproduct');
        Route::get('/seller-history','History')->name('history');
        Route::post('seller-storeproduct','StoreProduct')->name('storeproduct');
        Route::get('seller-editproduct/{id}','EditProduct')->name('editproduct');
        Route::post('seller-updateproduct','UpdateProduct')->name('updateproduct');
        Route::get('seller-singleproduct/{id}','SingleProduct')->name('singleproduct');
        Route::get('seller-deleteproduct/{id}','DeleteProduct')->name('deleteproduct');
    });
   
});

Route::middleware('auth','role:admin')->group(function () {
    Route::controller(AdminController::class)->group(function(){
        Route::get('admin/admin-dashboard','Index')->name('admindashboard');
        Route::get('admin/admin-allusers','AllUsers')->name('allusers');
       
       
        
    });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('admin/admin-allcategories','Index')->name('allcategories');
        Route::get('admin/admin-addcategory','AddCategory')->name('addcategory');
        
        Route::get('admin/admin-store-category','StoreCategory')->name('storecategory');
        Route::get('admin/admin-edit-category/{id}','EditCategory')->name('editcategory');
        Route::get('admin/admin-update-category','UpdateCategory')->name('updatecategory');
        Route::get('admin/admin-delete-category/{id}','DeleteCategory')->name('deletecategory');
    });
    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('admin/admin-addsubcategory','AddSubCategory')->name('addsubcategory');
        Route::get('admin/admin-allsubcategories','AllSubCategories')->name('allsubcategories');
        Route::get('admin/admin-storesubcategory','StoreSubCategory')->name('storesubcategory');
        Route::get('admin/admin-editsubcategory/{id}','EditSubCategory')->name('editsubcategory');
        Route::get('admin/admin-updatesubcategory','UpdateSubCategory')->name('updatesubcategory');
        Route::get('admin/admin-delete-subcategory/{id}','DeleteSubCategory')->name('deletesubcategory');
    });


    });
  
    

    

Route::middleware('auth','role:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
