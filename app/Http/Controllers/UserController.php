<?php

namespace App\Http\Controllers;
// namespace Symfony\Component\HttpFoundation\File\UploadedFile;

use App\Models\User;
use App\Models\Product;
use App\Models\Favorite;
// use Illuminate\Http\Concerns\InteractsWithInput;
use App\Models\Purchase;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserController extends Controller
{


    public function show(Request $request)
    {
        $categories = Categorie::all();

        $user = User::find(1);

        return view('user.profile', compact('categories', 'user'));
    }

    public function pageEdit(Request $request)
    {
        $categories = Categorie::all();
        $user = User::find(1);
        return view('user.edit', compact('categories', 'user'));
    }

    public function update(Request $request)
    {
        $user1 = User::find($request->id);
        $categories = Categorie::all();
        Storage::disk('public')->delete($user1->picture);
        $fileName = $user1->id . '-' . $user1->name . '-' . time() . '-' . $request->file('picture')->getClientOriginalName();

        $path = $request->file('picture')->storeAs('pictures', $fileName, 'public');

        User::where('id', $user1->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'picture' => 'storage/' . $path,
            'updated_at' => now()
        ]);
        $user = User::find($request->id);
        return view('user.profile', compact('user', 'categories'));
    }

    public function addCart(Request $request){
        $purchase = new Purchase();
        $purchase->user_id = 1;
        $purchase->product_id = $request->id;
        $purchase->created_at = now();
        $purchase->save();
        Session::flash('message', 'Success message !');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function addFavorite(Request $request){
        $favorite = new Favorite();
        $favorite->user_id = 1;
        $favorite->product_id = $request->id;
        $favorite->created_at = now();
        $favorite->save();
        Session::flash('message', 'Success message !');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

public function indexPurchase(){

    // $test = Purchase::where('user_id',1)->get();
    // $arr = $test->product_id;
    // dd($test);
    // $purchases = Product::whereIn('id',$arr)->get();
    // dd($purchases);
    $categories = Categorie::all();
        // $user = User::find(1);

        $i = 0;
        $purchases = DB::table('products')->
        join('purchases','products.id','=','purchases.product_id')->
        join('users','users.id','=','purchases.user_id')->
        where('user_id',1)->
        select('products.id','products.name','products.prise','products.picture','purchases.created_at','purchases.updated_at')->get();



    // dd($purchases);
    return view('user.purchases',compact('categories','purchases','i'));

    // $user = User::factory()
    //         ->has(Post::factory()->count(3))
    //         ->create();
}

}
