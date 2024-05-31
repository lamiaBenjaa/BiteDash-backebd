<?php

use App\Http\Controllers\api\BlogPostController;
use App\Http\Controllers\api\CategorieController;
use App\Http\Controllers\api\CommentController;
use App\Http\Controllers\api\DishController;
use App\Http\Controllers\api\FavoriteController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\OrderItemController;
use App\Http\Controllers\api\RestaurantController;
use App\Http\Controllers\api\ReviewController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users',UserController::class);
Route::apiResource('restaurants',RestaurantController::class);
Route::apiResource('categories',CategorieController::class);
Route::apiResource('dishes',DishController::class);
Route::apiResource('orders',OrderController::class);
Route::apiResource('orderItems',OrderItemController::class);
Route::apiResource('reviews',ReviewController::class);
Route::apiResource('favorites',FavoriteController::class);
Route::apiResource('posts',BlogPostController::class);
Route::apiResource('comments',CommentController::class);