<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\AdvertisementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->get('/admin', function () {
    return view('Back.index');

})->name('admin');

Route::group(['middleware'=>['auth','admin'],'prefix'=>'admin'], function(){
     Route::get('categoryDestroy/{id}',[CategoryController::class,'destroy'])->name('categoryDestroy');
     Route::get('advertisementyDestroy/{id}',[AdvertisementController::class,'destroy'])->name('advertisementDestroy');
     Route::resource('category',CategoryController::class);
     Route::resource('advertisement',AdvertisementController::class);
     Route::post('/deleteImage',[AdvertisementController::class,'deleteImage'])->name('deleteImage');
});
