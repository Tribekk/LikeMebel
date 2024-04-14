<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Models\Service;
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

Route::get('/', [ServiceController::class, 'index'])->name('home');

Route::get('/news', function () {
    $services=Service::all();
    return view('news');
})->name('news');

Route::get('/contacts', function () {
    $services=Service::all();
    return view('contacts', compact('services'));
})->name('contacts');

Route::get('/services', [ServiceController::class, 'view'])->name('services');
Route::get('/service/{id}', [ServiceController::class, 'serviceView'])->name('service');

Route::controller(UserController::class)->group(function (){
    Route::get('/signup', function (){
        $services=Service::all();
        return view('signup', compact('services'));
    })->name('signup');
    Route::post('/signup', 'signup');

    Route::get('/login', function (){
        $services=Service::all();
        return view('login', compact('services'));
    })->name('login');
    Route::post('/login', 'login');

    Route::get('/logout', 'logout')->name('logout');

    Route::get('/thisUser', 'thisUser')->name('thisUser');
    Route::post('/thisUser', 'updatePhoneUser');

    Route::get('/password', function (){
        $services=Service::all();
        return view('password', compact('services'));
    })->name('password');
    Route::post('/password', 'password');

    Route::get('/avatar', function (){
        $services=Service::all();
        return view('avatar', compact('services'));
    })->name('avatar');
    Route::post('/avatar', 'avatar');

    Route::get('/delete', 'destroy')->name('delete');
});

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
Route::post('/reviews', [ReviewController::class, 'create']);

Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/order', [OrderController::class, 'create']);

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/new/{id}', [NewsController::class, 'viewNew']);
