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