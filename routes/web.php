<?php

use App\Http\Controllers\AuthController;
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

Route::get('/signup', [AuthController::class, 'create'])->name('signup');
Route::post('/signup', [AuthController::class, 'store']);
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/registr', function () {
    return view('registr');
});

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/kitchen', function () {
    return view('kitchen');
})->name('kitchen');

Route::get('/order', function () {
    return view('order');
})->name('order');

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

Route::get('/children', function () {
    return view('children');
})->name('children');

Route::get('/living', function () {
    return view('living');
})->name('living');

Route::get('/wardrobe', function () {
    return view('wardrobe');
})->name('wardrobe');

Route::get('/GPT', function () {
})->name('GPT');