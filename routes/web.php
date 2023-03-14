<?php

use App\Http\Controllers\coursecontroller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/coursecreate',[coursecontroller::class,"course"]);
Route::post('/course',[coursecontroller::class,"create"]);
Route::get('/getCourseListapi',[coursecontroller::class,"getdata"]);
Route::put('/update/{id}',[coursecontroller::class,"update"]);
Route::delete('/delete/{id}',[coursecontroller::class,"delete"]);