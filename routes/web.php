<?php

use App\Http\Controllers\Admin\admin_Ctrl;
use App\Http\Controllers\Auth\Auth_Ctrl;
use App\Http\Controllers\Localization\Localization_ctrl;
use App\Http\Controllers\User\user_ctrl;
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
//localization 
Route::get("locale/{lange}",[Localization_ctrl::class,"setLang"]);


//user pages

    //=====index route============
    Route::get('/',[user_ctrl::class,'index']);

    //===========register function=========
    Route::post('/register',[Auth_Ctrl::class,'register_fun']);

    //============sigin function ===============
    Route::post('/signin',[Auth_Ctrl::class,'signin_fun']);

    //=========loout==================
    Route::get('/logout',[Auth_Ctrl::class,'logout_fun'])->name('logout');

    //=====================error page=============
    Route::fallback(function () {
    
        return view('users_pages/errors-404');
    });
    //==============shop page
    Route::get('/shop',[user_ctrl::class,'shop']);
    //sort function
    Route::get('/search/sortby_newest',[user_ctrl::class,'sort_by_newest']);
    Route::get('/search/sortby_oldest',[user_ctrl::class,'sortby_oldest']);
    Route::get('/search/sortby_price_low',[user_ctrl::class,'sortby_price_low']);
    Route::get('/search/sortby_price_high',[user_ctrl::class,'sortby_price_high']);

    //filter catygory_filter
    Route::get('/subcategory/search/{id}',[user_ctrl::class,'sub_catygory_filter']);
    Route::get('/category/search/{id}',[user_ctrl::class,'catygory_filter']);
    //===================prodcut details================
    Route::get('/about/product/{id}',[user_ctrl::class,'product_details']);

    //==================search====================
    Route::get('/prodcut/search',[user_ctrl::class,'search']);
    //===================add to cart =========================
    Route::post('/add/product/to/cart/{id}',[user_ctrl::class,'addcart']);
    //==================cart page======================
    Route::get('/cart',[user_ctrl::class,'cart_page']);

    Route::post('/increment-cart-item',[user_ctrl::class,'increment'])->name('cart.increment');
    Route::post('/decrement-cart-item', [user_ctrl::class,'decrement'])->name('cart.decrement');
    Route::post('/update-cart-item-quantity', [user_ctrl::class,'updateQuantity'])->name('cart.updateQuantity');
    Route::get('delet_product_cart/{id}',[user_ctrl::class,'delet_product_cart'])->name('delet_product');

    //=================check out===============
    Route::get('/checkout',[user_ctrl::class,'checkout_page']);
    Route::post('/checkout/sucess',[user_ctrl::class,'checkout_function']);
    Route::get('/get-shipping-cost',[user_ctrl::class,'getShippingCost']);
    //===========about page=================
    Route::get('/about',[user_ctrl::class,'about_page']);

   //===========contact page=================
   Route::get('/contact',[user_ctrl::class,'contact_page']);
   Route::post('/send-message',[admin_Ctrl::class,'sendEmail'])->name('contact');





//end user pages

//elshima pages

    // Route::get('/Elshima/index',[user_ctrl::class,'index_elshima']);

//end elshima pages












//admin pages

Route::group(['middleware' => ['isAdmin'], 'prefix' => 'admin'], function() {
    // Dashboard page
    Route::get('/index', [admin_Ctrl::class, 'admin']);

    // Categories page
    Route::get('/categories', [admin_Ctrl::class, 'categories']);
    //add new category function
    Route::post('add_new_category',[admin_Ctrl::class,'categories_fun']);
    //edite category
    Route::post('edite_category',[admin_Ctrl::class,'edit_categories_fun']);
    //delete category
    Route::get('/delete/{id}',[admin_Ctrl::class,'delete_categories_fun']);

    //subcategoires page
    Route::get('/subcategories',[admin_Ctrl::class,'subcategories']);

    //add new subcategories function
    Route::post('addnewsubcategories',[admin_Ctrl::class,'subcategories_fun']);
    //edite subcategory
    Route::post('edite_subcategory',[admin_Ctrl::class,'edit_subcategories_fun']);
    //delete subcategory
    Route::get('/delete/subcategory/{id}',[admin_Ctrl::class,'delete_subcategories_fun']);


    //products page
    Route::get('/products', [admin_Ctrl::class, 'products']);
    //elsiam prodcut
    // Route::get('elshaima/products', [admin_Ctrl::class, 'elshaima_products']);

    //add new product form
    Route::get('/add/new/product', [admin_Ctrl::class, 'addnewproductform']);
    Route::post('/get_sub_category', [admin_Ctrl::class,'get_sub_category'])->name('get_sub_category');

    //add new product function
    Route::post('/add/new/product/save', [admin_Ctrl::class, 'add_new_product_fun']);
    //edite the product form   
    Route::get('/product/edite/{id}', [admin_Ctrl::class, 'edite_product_form']);
    //edite product function
    Route::post('/product/edite/save', [admin_Ctrl::class, 'edite_product_fun']);
    //product delete
    Route::get('/product/delete/{id}',[admin_Ctrl::class,'delete_product_fun']);
    //orders page 
    Route::get('/orders',[admin_Ctrl::class,'order_page']);
    //order details
    Route::get('/order/details/{id}',[admin_Ctrl::class,'order_details']);
    //confirm oreder
    Route::get('/Confirm/Order/{id}',[admin_Ctrl::class,'confirm_order']);
    //reject order
    Route::get('/reject/Order/{id}',[admin_Ctrl::class,'reject_order']);
   //reject order page
    Route::get('/rejected/Orders/',[admin_Ctrl::class,'rejcted_order_page']);
    //shipping function 
    Route::get('/shipping/information',[admin_Ctrl::class,'shipping']);

    Route::post('/Add_Shipping_info_data',[admin_Ctrl::class,'Add_Shipping_info_data']);
    

    Route::post('/shipping_info',[admin_Ctrl::class,'shipping_info']);

    Route::get('/shipping/delete/{id}',[admin_Ctrl::class,'delete_shipping_item_fun']);


});