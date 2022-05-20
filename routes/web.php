<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user',function(){
    return view('layouts.user');
});

Route::get('/',function(){
    return view('user.index');
});


Route::get('/id',function(){
    return view('user.loged');
});

Route::get('/ids',function(){
    return view('user.categories');
});

Route::get('/ida',function(){
    return view('user.about');
});


Route::get('/idc',function(){
    return view('user.contact');
});

Route::get('/idp',function(){
    return view('user.profile');
});


Route::get('/edit',function(){
    return view('user.edit');
});
