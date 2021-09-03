<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryModelController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CollectionController;


    
Route::group(['middleware' => ['cors', 'json.response']], function () {

    /**************** AUTHENTICATIONS **************** */ 
    Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register','Auth\ApiAuthController@register')->name('register.api');
 
});
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');
 

    /**************** Products APIs **************** */    
    Route::post('products',[ProductController::class,'store'])->name('store.api');
    Route::get('products',[ProductController::class,'index'])->name('index.api');
    Route::get('products/{id}',[ProductController::class,'show'])->name('show.api');
    Route::get('/products/search/{name}',[ProductController::class,'search']);
    Route::put('products/{id}',[ProductController::class,'update'])->name('update.api');
    Route::delete('products/{id}',[ProductController::class,'destroy'])->name('destroy.api');
    
    /**************** Categories APIs **************** */
    Route::post('category',[CategoryModelController::class,'store'])->name('store.api');
    Route::get('category',[CategoryModelController::class,'index'])->name('index.api');
    Route::put('category/{id}',[CategoryModelController::class,'update'])->name('update.api');
    Route::get('category/{id}',[CategoryModelController::class,'show'])->name('show.api');
    Route::delete('category/{id}',[CategoryModelController::class,'destroy'])->name('destroy.api');

    /**************** Discount APIs **************** */
    Route::post('discount',[DiscountController::class,'store'])->name('store.api');
    Route::get('discount',[DiscountController::class,'index'])->name('index.api');
    Route::get('discount/{id}',[DiscountController::class,'show'])->name('show.api');
    Route::put('discount/{id}',[DiscountController::class,'update'])->name('update.api');
    Route::delete('discount/{id}',[DiscountController::class,'destroy'])->name('destroy.api');

    /**************** Referral APIs **************** */
    Route::post('referral',[ReferralController::class,'store'])->name('store.api');
    Route::get('referral',[ReferralController::class,'index'])->name('index.api');
    Route::get('referral/{id}',[ReferralController::class,'show'])->name('show.api');
    Route::put('referral/{id}',[ReferralController::class,'update'])->name('update.api');
    Route::delete('referral/{id}',[ReferralController::class,'destroy'])->name('destroy.api'); 
  
     /**************** Blogs APIs **************** */
    Route::post('blog',[BlogController::class,'store'])->name('blog.store.api');
    Route::get('blog',[BlogController::class,'index'])->name('blog.index.api');
    Route::get('blog/{id}',[BlogController::class,'show'])->name('blog.show.api');
    Route::put('blog/{id}',[BlogController::class,'update'])->name('blog.update.api');
    Route::delete('blog/{id}',[BlogController::class,'destroy'])->name('blog.destroy.api');


    
    /**************** Delivery API's **************** */ 
Route::post('delivery',[DeliveryController::class,'store'])->name('store.api');
Route::get('delivery',[DeliveryController::class,'index'])->name('index.api');
Route::put('delivery/{id}',[DeliveryController::class,'update'])->name('update.api');
Route::get('delivery/{id}',[DeliveryController::class,'show'])->name('show.api');
Route::delete('delivery/{id}',[DeliveryController::class,'destroy'])->name('destroy.api');

    /**************** Collection API's **************** */ 
Route::post('collection',[CollectionController::class,'store'])->name('store.api');
Route::get('collection',[CollectionController::class,'index'])->name('index.api');
Route::put('collection/{id}',[CollectionController::class,'update'])->name('update.api');
Route::get('collection/{id}',[CollectionController::class,'show'])->name('show.api');
Route::delete('collection/{id}',[CollectionController::class,'destroy'])->name('destroy.api');



    Route::post('/role/create', 'RoleController@creatRole')->name('creatRole.api');
    Route::post('/role/delete', 'RoleController@deletRole')->name('deletRole.api');

    Route::post('/role/permissions/create', 'PermissionsController@creatPermissions')->name('creatPermissions.api');
    Route::post('/role/permissions/delete', 'PermissionsController@deletePermissions')->name('deletePermissions.api');

    Route::post('/role/assign', 'RoleController@assignRole')->name('assignRole.api');
    Route::post('/role/revoke', 'RoleController@revokeRole')->name('revokeRole.api');

    Route::post('/role/permissions/assign', 'PermissionsController@assignPermissions')->name('assignPermissions.api');
    Route::post('/role/permissions/revoke', 'PermissionsController@revokePermissions')->name('revokePermissions.api');

});
