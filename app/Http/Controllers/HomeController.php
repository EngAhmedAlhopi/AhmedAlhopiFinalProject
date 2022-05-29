<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $populars = DB::table('products')->join('populars','product_id','products.id')->
        select('products.id','products.categorie_id','products.name','products.prise','products.description','products.information','products.picture')->
        get();
        $user = User::find(auth()->user()->id);
        // dd($user);
        $found = false;
        if (Auth::check()) {
            $found = true;
        }
        return view('user.loged', compact('categories', 'populars', 'user', 'found'));
        // return view('home',compact('categories','populars','user'));
        // return view('loged');
    }
}
