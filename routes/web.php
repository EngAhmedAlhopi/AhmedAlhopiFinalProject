<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
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

Auth::routes();

Route::get('/',[CategorieController::class,'index'])->name('indexindex');

Route::get('categorie/{id}',[CategorieController::class,'allProducts'])->name('allProducts');

Route::get('/ida',function(){
    $categories = Categorie::all();
        $found = false;
        if (Auth::check()) {
            $user = User::find(auth()->user()->id);
            $found = true;
            return view('user.about', compact('categories', 'user', 'found'));
        }

        return view('user.about', compact('categories', 'found'));
})->name('about');

Route::get('/idc',[MessageController::class,'call'])->name('call');

Route::post('/idc',[MessageController::class,'send'])->name('send');

Route::get('/profile',[UserController::class,'show'])->name('show.user');

Route::get('/edit',[UserController::class,'pageEdit'])->name('pageEdit.user');

Route::post('/edit',[UserController::class,'update'])->name('update.user');

Route::get('/purchases',[UserController::class,'indexPurchase'])->name('indexPurchase');

Route::get('/favorite',[UserController::class,'indexFavorite'])->name('indexFavorite');

Route::get('/chpassword',function(){
    $user = User::find(auth()->user()->id);
    $categories = Categorie::all();
    $found = true;
    $result = 'Try to enter a password that is difficult to guess.';
    return view('user.chpassword',compact('user','categories','result','found'));
});

Route::post('/chpassword',[UserController::class,'resetPassword'])->name('resetPassword');

Route::get('/admin',[AdminController::class,'index'])->name('indexAdmin');

Route::get('/buying/{id}',[UserController::class,'addCart'])->name('addCart');

Route::get('/preference/{id}',[UserController::class,'addFavorite'])->name('addFavorite');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('show/{id}',function($id){
        $product = Product::find($id);
        $categories = Categorie::all();
        $found = false;
        $categorie = Categorie::find($id);
        if (Auth::check()) {
            $user = User::find(auth()->user()->id);
            $found = true;
            return view('user.show', compact('product', 'categories', 'user', 'found', 'categorie'));
        }
        return view('user.show', compact('product', 'categories', 'found', 'categorie'));
})->name('show');

Route::get('add-product',[AdminController::class,'newPrpduct'])->name('add-product');

Route::post('add-product',[AdminController::class,'addProduct'])->name('add-new-product');

Route::post('add-categorie',[AdminController::class,'addCategorie'])->name('addCategorie');

Route::get('/all-products',[AdminController::class,'indexProducts'])->name('indexProducts');

Route::post('show-product/{id}',[AdminController::class,'show'])->name('showProduct');

Route::get('edit-product/{id}',[AdminController::class,'editPage'])->name('editProductPage');
Route::post('edit-product/{id}',[AdminController::class,'edit'])->name('editProduct');

Route::post('delete-product/{id}',[AdminController::class,'delete'])->name('deleteProduct');

Route::post('addPopular-product/{id}',[AdminController::class,'addPopular'])->name('addPopular');



















