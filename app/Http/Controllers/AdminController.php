<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Popular;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Favorite;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Database\Eloquent\Collection;

class AdminController extends Controller
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

    // public function about()
    // {

    // }
    public function index()
    {
        $i = 0;
        $purchases = DB::table('products')->join('purchases', 'products.id', '=', 'purchases.product_id')->join('users', 'users.id', '=', 'purchases.user_id')->select('products.id', 'products.name as product_name', 'products.prise', 'products.picture', 'purchases.created_at', 'purchases.updated_at', 'users.name', 'users.email')->get();
        return view('admin.index', compact('purchases', 'i'));
    }

    public function newPrpduct()
    {
        $categories = Categorie::all();
        return view('admin.add', compact('categories'));
    }

    public function addProduct(Request $request)
    {

        // $categories = Categorie::all();
        $product = new Product();
        if ($request->picture != null) {
            $fileName = $request->category . '-' . time() . '-' . $request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->storeAs('pictures', $fileName, 'public');
            $product->name = $request->name;
            $product->categorie_id = $request->categorie;
            $product->prise = $request->price;
            $product->description = $request->description;
            $product->information = $request->information;
            $product->picture = 'storage/' . $path;
            $product->created_at = now();
            $product->save();
        } else {
            $product->name = $request->name;
            $product->categorie_id = $request->categorie;
            $product->prise = $request->price;
            $product->description = $request->description;
            $product->information = $request->information;
            $product->created_at = now();
            $product->save();
        }
        return redirect()->back();
    }

    public function indexProducts()
    {
        $i = 0;
        $products = Product::all()->sortBy('categorie_id');
        return view('admin.all-products', compact('products', 'i'));
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $product = Product::find($request->id);
        $categorie = Categorie::where('id', $request->categorie_id)->get();
        return view('admin.show', compact('product', 'categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $product = Product::find($request->id);
        if ($request->picture != null) {
            $fileName = $product->id . '-' . $product->name . '-' . time() . '-' . $request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->storeAs('pictures', $fileName, 'public');
            User::where('id', $product->id)->update([
                'name' => $request->name,
                'prise' => $request->price,
                'description' => $request->description,
                'information' => $request->information,
                'categorie_id' => $request->categorie,
                'picture' => 'storage/' . $path,
                'updated_at' => now()
            ]);
        } else {
            User::where('id', $product->id)->update([
                'name' => $request->name,
                'prise' => $request->price,
                'description' => $request->description,
                'information' => $request->information,
                'categorie_id' => $request->categorie,
                'updated_at' => now()
            ]);
        }

        return redirect()->back();
    }

    public function addPopular(Request $request)
    {
        $p = Popular::all();
        $found = false;
        foreach ($p as $v) {
            if ($v->product_id == $request->id) {
                $found = true;
                break;
            }
        }
        if ($found == false) {
            $popular = new Popular();
            $popular->categorie_id = $request->categorie;
            $popular->product_id = $request->id;
            $popular->created_at = now();
            $popular->save();
            return redirect()->back();
        } else {
            $p = Popular::where('categorie_id', $request->categorie)->where('product_id', $request->id);
            $p->delete();
            return redirect()->back();
        }
    }

    public function editPage(Request $request)
    {
        $product = Product::find($request->id);
        $categories = Categorie::all();
        return view('admin.edit', compact('product', 'categories'));
    }


    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        $p = Popular::where('categorie_id', $request->categorie_id)->where('product_id', $request->product_id)->first();
        $f = Favorite::where('product_id', $request->id)->get();
        $pp = Purchase::where('product_id', $request->id)->get();
        if ($p == null && $f == null  && $pp == null) {
            $product->delete();
        } elseif ($p == null && $f == null  && $pp != null) {
            $pp->delete();
            $product->delete();
        } elseif ($p == null && $f != null  && $pp == null) {
            $f->delete();
            $product->delete();
        } elseif ($p != null && $f == null  && $pp == null) {
            $p->delete();
            $product->delete();
        } elseif ($p == null && $f != null  && $pp != null) {
            $f->delete();
            $pp->delete();
            $product->delete();
        } elseif ($p != null && $f == null  && $pp != null) {
            $p->delete();
            $pp->delete();
            $product->delete();
        } elseif ($p != null && $f != null  && $pp == null) {
            $p->delete();
            $pp->delete();
            $product->delete();
        } else {
            $p->delete();
            $f->delete();
            $pp->delete();
            $product->delete();
        }
        return redirect()->back();
    }

























    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
