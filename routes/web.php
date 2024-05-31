<?php


use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DishController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('pages.login.show');
});

Route::get('/Home', function () {
    return view('welcome1');
})->Middleware('auth');

Route::middleware(['auth','checkAdmin'])->group(function(){

Route::get('/home',function(){
    return view('welcome');
});
Route::resource('users',UserController::class)->middleware('verified');
Route::resource('restaurants',RestaurantController::class);
Route::resource('categories',CategorieController::class);
Route::resource('dishes',DishController::class);
Route::resource('orders',OrderController::class);
Route::resource('orderItems',OrderItemController::class);
Route::resource('reviews',ReviewController::class);
Route::resource('favorites',FavoriteController::class);
Route::resource('posts',BlogPostController::class);
Route::resource('comments',CommentController::class);
});

Route::get('logout',[LoginController::class,'logout'])->middleware('auth')->name('logout');


Route::get('login',[LoginController::class,'show'])->name('showLogin');
Route::post('login',[LoginController::class,'login'])->name('login.login');


Route::get('register',[RegisterController::class,'show'])->name('showRegister');
Route::post('register',[RegisterController::class,'register'])->name('Register');




