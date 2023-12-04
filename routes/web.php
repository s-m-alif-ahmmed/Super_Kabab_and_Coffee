<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilePhotoController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DiscountCodeController;


Route::middleware(['userBan'])->group(function () {

    //website

    Route::get('/', [WebsiteController::class, 'index'])->name('home');
    Route::get('/menu-page/{id}', [WebsiteController::class, 'menuPage'])->name('menu.page');
    Route::get('/order-online', [WebsiteController::class, 'orderOnline'])->name('order.online');
    Route::get('/story', [WebsiteController::class, 'story'])->name('story');
    Route::get('/item-detail/{id}', [WebsiteController::class, 'detail'])->name('item.detail');

    //Search

    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/search-result', [SearchController::class, 'searchResult'])->name('search.result');
    Route::get('/search/search-items', [SearchController::class, 'searchItems'])->name('search.items');


    //Terms, Privacy and Return Polices

    Route::get('/terms',[PolicyController::class,'terms'])->name('policy.terms');
    Route::get('/privacy',[PolicyController::class,'privacy'])->name('policy.privacy');
    Route::get('/return',[PolicyController::class,'return'])->name('policy.return');

    //Google & Facebook login

    Route::get('/auth/{provider}/redirect',[LoginController::class,'redirect']);
    Route::get('/auth/{provider}/callback',[LoginController::class,'callback']);



    Route::middleware(['auth', 'verified'])->group(function () {

        Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

         //    User Middleware

         Route::middleware(['user'])->group(function () {

//            User Address

             Route::resource('address',AddressController::class);

             //Cart

             Route::post('/cart/add/{id}',[CartController::class,'index'])->name('cart.add');
             Route::get('/cart/show',[CartController::class,'show'])->name('cart.show');
             Route::post('/cart/update/{id}', [CartController::class,'update'])->name('cart.update');
             Route::get('/cart/remove/{id}',[CartController::class,'remove'])->name('cart.remove');

             Route::get('cuponcheck',[CheckoutController::class,'cuponcheck'])->name('cuponcheck');


             Route::post('/apply-discount', [CartController::class,'applyDiscount'])->name('front.applyDiscount');


             //   Checkout

             Route::get('/order/confirm',[CheckoutController::class,'orderConfirm'])->name('order.confirm');
             Route::post('/order/new',[CheckoutController::class,'newOrder'])->name('order.new');
             Route::get('/order/info',[CheckoutController::class,'addInformation'])->name('info');
             Route::post('/order/info/{id}',[CheckoutController::class,'information'])->name('checkout.info');

             Route::get('/order/detail/{id}',[CheckoutController::class,'orderDetail'])->name('order.detail');

         });

         //    Admin Middleware

         Route::middleware(['admin'])->group(function () {

             //    Category

             Route::resource('category',CategoryController::class);
             Route::get('/category-change-status/{id}',[CategoryController::class,'categoryChangeStatus'])->name('category-change-status');


             //    Item

             Route::resource('item',ItemController::class);
             Route::get('/item-change-status/{id}',[ItemController::class,'itemChangeStatus'])->name('item-change-status');

             //        User

             Route::get('/users',[UserController::class,'users'])->name('users');
             Route::get('/users-detail/{id}',[UserController::class,'usersDetail'])->name('users-detail');
             Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete-user');
             Route::get('/change-role/{id}',[UserController::class,'changeRole'])->name('change-role');
             Route::get('/change-ban-status/{id}',[UserController::class,'changeBanStatus'])->name('change-ban-status');

//            Admin Order

             Route::get('/admin/order/manage',[AdminOrderController::class,'manage'])->name('admin.manage.order');
             Route::get('/admin/order/completed',[AdminOrderController::class,'completed'])->name('admin.order.completed');
             Route::get('/admin/order/canceled',[AdminOrderController::class,'canceled'])->name('admin.order.canceled');
             Route::get('/admin/order-detail/{id}',[AdminOrderController::class,'detail'])->name('admin.order-detail');
             Route::get('/admin/order-invoice/{id}',[AdminOrderController::class,'invoice'])->name('admin.order-invoice');
             Route::delete('/admin/order-delete/{id}',[AdminOrderController::class,'delete'])->name('admin.order-delete');
             Route::get('/order-status/{id}',[AdminOrderController::class,'orderStatus'])->name('order.status');

             //    Country

             Route::resource('country',CountryController::class);
             Route::get('/country-change-status/{id}',[CountryController::class,'countryChangeStatus'])->name('country-change-status');

//            Invoice Download

             Route::get('/invoice/{orderId}/generate', [InvoiceController::class, 'generateInvoice'])->name('download');

//            Discount Coupon

             Route::resource('coupon', DiscountCodeController::class);
             Route::get('/coupon-status/{id}',[DiscountCodeController::class,'couponStatus'])->name('coupon.status');

         });


     });

    Route::middleware('auth')->group(function () {

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //    Profile Photo manage

        Route::resource('/photo', ProfilePhotoController::class);

    });


});

//Route::get('cuponcheck',[CheckoutController::class,'cuponcheck'])->name('cuponcheck');


require __DIR__.'/auth.php';
