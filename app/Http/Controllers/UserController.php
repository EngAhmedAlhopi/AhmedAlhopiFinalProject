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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserController extends Controller
{


    public function show(Request $request)
    {
        $categories = Categorie::all();

        $user = User::find(auth()->user()->id);

        return view('user.profile', compact('categories', 'user'));
    }

    public function pageEdit(Request $request)
    {
        $categories = Categorie::all();
        $user = User::find(auth()->user()->id);
        return view('user.edit', compact('categories', 'user'));
    }

    public function update(Request $request)
    {
        $user1 = User::find($request->id);
        $categories = Categorie::all();
        // Storage::disk('public')->delete($user1->picture);

        if ($request->picture != null) {
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
        } else {
            User::where('id', $user1->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'updated_at' => now()
            ]);
        }
        // User::where('id', $user1->id)->update([
        //     'name' => $request->name,
        //     'phone' => $request->phone,
        //     'mobile' => $request->mobile,
        //     'address' => $request->address,
        //     'picture' => 'storage/' . $path,
        //     'updated_at' => now()
        // ]);

        $user = User::find($request->id);
        return view('user.profile', compact('user', 'categories'));
    }

    public function addCart(Request $request)
    {
        $purchase = new Purchase();
        $purchase->user_id = 1;
        $purchase->product_id = $request->id;
        $purchase->created_at = now();
        $purchase->save();
        Session::flash('message', 'Success message !');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function addFavorite(Request $request)
    {
        $favorite = new Favorite();
        $favorite->user_id = 1;
        $favorite->product_id = $request->id;
        $favorite->created_at = now();
        $favorite->save();
        Session::flash('message', 'Success message !');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function indexPurchase()
    {

        $categories = Categorie::all();
        $user = User::find(auth()->user()->id);
        // $user = User::where('id',1)->get();
        $i = 0;
        $purchases = DB::table('products')->join('purchases', 'products.id', '=', 'purchases.product_id')->join('users', 'users.id', '=', 'purchases.user_id')->where('user_id', auth()->user()->id)->select('products.id', 'products.name', 'products.prise', 'products.picture', 'purchases.created_at', 'purchases.updated_at')->get();
        return view('user.purchases', compact('categories', 'purchases', 'i', 'user'));
    }


    public function indexFavorite()
    {

        $categories = Categorie::all();
        $user = User::find(auth()->user()->id);

        // $i = 0;
        $favorites = DB::table('products')->join('favorites', 'products.id', '=', 'favorites.product_id')->join('users', 'users.id', '=', 'favorites.user_id')->where('user_id', auth()->user()->id)->select('products.id', 'products.name', 'products.prise', 'products.picture', 'products.description')->get();
        return view('user.favorite', compact('categories', 'favorites', 'user'));
    }

    public function resetPassword(Request $request)
    {

        $user1 = User::find(auth()->user()->id);
        $categories = Categorie::all();
        $result = 'Try to enter a password that is difficult to guess.';
        // dd($request->newpass == $request->rpass);
        if ($user1->password == Hash::make($request->oldpass)) {
            if ($request->newpass == $request->rpass) {
                User::where('id', auth()->user()->id)->update([
                    'password' => Hash::make($request->newpass)
                ]);
                $user = User::find(auth()->user()->id);
                return view('user.profile', compact('result', 'user', 'categories'));
            }
        } else {
            $user = User::find(auth()->user()->id);
            $result = 'The old password is wrong!';
            return view('user.chpassword', compact('user', 'categories', 'result'));
        }
        if ($request->newpass != $request->rpass) {
            $user = User::find(auth()->user()->id);
            $result = 'Passwords do not match!';
            return view('user.chpassword', compact('user', 'categories', 'result'));
        }
    }

    public function call()
    {
        $categories = Categorie::all();
        $found = false;
        if (Auth::check()) {
            $user = User::find(auth()->user()->id);
            $found = true;
            return view('user.contact', compact('user', 'categories','found'));
        }
        else{
            $user = [
                'name' => ' ' ,
                'email' => ' '
            ];
            return view('user.contact', compact('user', 'categories','found'));
        }
    }
}
