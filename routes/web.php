<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/bathroom', function () {
    return view('bathroom');
})->name('bathroom');

Route::get('/bedroom', function () {
    return view('bedroom');
})->name('bedroom');

Route::get('/kitchen', function () {
    return view('kitchen');
})->name('kitchen');

Route::get('/children', function () {
    return view('children');
})->name('children');

Route::get('/living', function () {
    return view('living');
})->name('living');

Route::get('/wardrobe', function () {
    return view('wardrobe');
})->name('wardrobe');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::controller(UserController::class)->group(function (){
    Route::get('/signup', function (){
        return view('signup');
    })->name('signup');
    Route::post('/signup', 'signup');

    Route::get('/login', function (){
        return view('login');
    })->name('login');
    Route::post('/login', 'login');

    Route::get('/logout', 'logout')->name('logout');

    Route::get('/thisUser', 'thisUser')->name('thisUser');
    Route::post('/thisUser', 'updatePhoneUser');

    Route::get('/password', function (){
        return view('password');
    })->name('password');
    Route::post('/password', 'password');

    Route::get('/avatar', function (){
        return view('avatar');
    })->name('avatar');
    Route::post('/avatar', 'avatar');

    Route::get('/delete', 'destroy')->name('delete');
});

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
Route::post('/reviews', [ReviewController::class, 'create']);

Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/order', [OrderController::class, 'create']);
