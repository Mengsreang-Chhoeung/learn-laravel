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

Route::get('/hello', function () {
    return "Hello via GET";
});

Route::post('/hello', function () {
    return "Hello via POST";
});

Route::put('/hello', function () {
    return "Hello via PUT";
});

Route::patch('/hello', function () {
    return "Hello via PATCH";
});

Route::delete('/hello', function () {
    return "Hello via DELETE";
});

Route::options('/hello', function () {
    return "Hello via OPTIONS";
});

Route::match(['get', 'post'], '/hello', function () {
    return "Hello via GET or POST";
});

Route::match(['get', 'post'], '/hi', function () {
    return "Hi via GET or POST";
});

Route::any('/haha', function () {
    return "Haha to all the HTTP methods.";
});
