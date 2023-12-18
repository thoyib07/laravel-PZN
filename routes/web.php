<?php

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
    return view('welcome');
});

Route::get('/thoyib',function () {
    return "Hello Thoyib Hidayat";
});

Route::view('/hello', 'hello', ['name' => 'Thoyib Hidayat']);

Route::get('/hello-again',function () {
    return view('hello', ['name' => "Thoyib Hidayat"]);
});

Route::get('/hello-world',function () {
    return view('hello.world', ['name' => "Thoyib Hidayat"]);
});

Route::redirect('/youtube','/thoyib');
Route::fallback(function () {
    return "404 nih";
});

Route::get('/products/{id}', function ($productId){
    return "Products : $productId";
});

Route::get('/products/{product}/items/{item}', function ($productId, $itemId){
    return "Products : $productId, Item : $itemId";
});

Route::get('/category/{id}', function ($categoryId) {
    return "Category : $categoryId";
})->where('id', '[0-9]*');

Route::get('/user/{id?}', function ($categoryId = "404") {
    return "User : $categoryId";
});