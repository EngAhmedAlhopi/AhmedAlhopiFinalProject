<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Popular;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;


class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $categories = Categorie::all();
        $found = false;
        // $populars = Product::auth('popular_id')->groupBy('id');//==> مفتاح مرجع لعرض البيانات
        // $populars = new Product();
        $populars = DB::table('products')->join('populars','product_id','products.id')->
        select('products.id','products.categorie_id','products.name','products.prise','products.description','products.information','products.picture')->
        get();        if (Auth::check()) {
            $found = true;
        }
        // view('layouts.user',compact('categories','populars'));
        // view('user.loged',compact('categories','populars'));
        // dd($populars);
        return view('user.index', compact('categories', 'populars', 'found'));
        // return view('layouts.user',compact('categories','populars'));
    }

    public function allProducts($id)
    {

        $products = Product::where('categorie_id',$id)->get();
        $categories = Categorie::all();
        $found = false;
        $categorie = Categorie::find($id);
        if (Auth::check()) {
            $user = User::find(auth()->user()->id);
            $found = true;
            return view('user.categories', compact('products', 'categories', 'user', 'found', 'categorie'));
        }

        return view('user.categories', compact('products', 'categories', 'found', 'categorie'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        //
    }
}
