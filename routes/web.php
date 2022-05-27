<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;

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

Route::get('/log', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user',function(){
    return view('layouts.user');
});

Route::get('/',[CategorieController::class,'index'])->name('indexindex');


// Route::get('/home',function(){
//     $categories = Categorie::all();
//     $populars = Product::all()->where('id','<','10')->sortBy('id');
//     $user = User::where('id',auth()->user()->id)->get();
//     return view('user.loged',compact('categories','populars','user'));
// })->name('loged');


// Route::post('/home',function(){
//     $categories = Categorie::all();
//     $popugars = Product::all()->where('id','<','10')->sortBy('id');
//     $user = User::find(auth()->user()->id);
//     return view('user.loged',compact('categories','populars','user'));
// })->name('loged');




Route::get('/ids',function(){
    return view('user.categories');
});

Route::get('/ida',function(){
    return view('user.about');
});


Route::get('/idc',[UserController::class,'call']);

// Route::get('/profile',function(){
//     // $categories = Categorie::all();
//     // return view('user.profile',compact('categories'));

//     // return view('user.profile');
// });

Route::get('/profile',[UserController::class,'show'])->name('show.user');

Route::get('/edit',[UserController::class,'pageEdit'])->name('pageEdit.user');

Route::post('/edit',[UserController::class,'update'])->name('update.user');

// Route::get('/edit',function(){
//     $categories = Categorie::all();
//     return view('user.edit',compact('categories'));
//     // return view('user.edit');
// });

Route::get('/purchases',[UserController::class,'indexPurchase'])->name('indexPurchase');

Route::get('/favorite',[UserController::class,'indexFavorite'])->name('indexFavorite');

Route::get('/chpassword',function(){
    $user = User::find(auth()->user()->id);
    $categories = Categorie::all();
    $result = 'Try to enter a password that is difficult to guess.';
    return view('user.chpassword',compact('user','categories','result'));
});

Route::post('/chpassword',[UserController::class,'resetPassword'])->name('resetPassword');

Route::get('/reg',function(){
    $categories = Categorie::all();
    $populars = Product::all()->where('id','<','10')->sortBy('id');
    return view('auth.register',compact('categories','populars'));
});


Route::get('/admin',function(){
    return view('layouts.admin');
});


Route::get('/buying/{id}',[UserController::class,'addCart'])->name('addCart');
Route::get('/preference/{id}',[UserController::class,'addFavorite'])->name('addFavorite');

Auth::routes();

// Route::post('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
