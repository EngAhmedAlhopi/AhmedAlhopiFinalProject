<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Categorie::all();
    $populars = Product::all()->where('id','<','10')->sortBy('id');
    $user = User::find(auth()->user()->id);
    return view('user.loged',compact('categories','populars','user'));
    // return view('home',compact('categories','populars','user'));
        // return view('loged');
    }
}
