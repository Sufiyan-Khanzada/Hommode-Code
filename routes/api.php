<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CategeriousController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\BlogsController;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('register', [PassportController::class, 'register']);
Route::post('login', [PassportController::class, 'login']);
Route::get('showall-users', [PassportController::class, 'allusers']);

///Item's APi's////
Route::middleware('auth:api')->group(function () {
Route::post('itemadd', [ItemsController::class, 'store']);
Route::get('showall-item', [ItemsController::class, 'allproducts']);
Route::post('show-single/{id}', [ItemsController::class, 'show_single_product']);
Route::post('delete-item/{id}', [ItemsController::class, 'destroy']);
});

///Category API's/////
Route::middleware('auth:api')->group(function () {

Route::post('catadd', [CategeriousController::class, 'store']);
Route::get('showall-cat', [CategeriousController::class, 'allcat']);
Route::post('show-single_cat/{id}',[CategeriousController::class, 'show_single_category']);
Route::post('delete-cat/{id}', [CategeriousController::class, 'destroy_cat']);
Route::post('{id}/update-cat',[CategeriousController::class,'update_cat']);

});

///Brand's APi's////
Route::middleware('auth:api')->group(function () {
Route::post('brandadd', [BrandsController::class, 'store']);
Route::get('showall-brand', [BrandsController::class, 'allproducts']);
Route::post('show-single-brand/{id}', [BrandsController::class, 'show_single_brand']);
Route::post('delete-brands/{id}', [BrandsController::class, 'destroy']);
});



// put all api protected routes here
Route::middleware('auth:api')->group(function () {
    Route::post('user-detail', [PassportController::class, 'userDetail']);
    Route::post('logout', [PassportController::class, 'logout']);
});


Route::post('blogsadd',[BlogsController::class,'create_blogs']);
Route::post('{id}/update-blog',[BlogsController::class,'update_blogs']);
Route::post('delete-blog/{id}',[BlogsController::class,'destroy_blog']);
Route::get('get-blogs',[BlogsController::class,'allblogs']);
Route::post('single-blog/{id}',[BlogsController::class,'show_blogs']);



Route::post('favsadd',[BlogsController::class,'create_fav']);
Route::post('delete-fav/{id}',[BlogsController::class,'destroy_fav']);
Route::get('get-fav',[BlogsController::class,'all']);



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
