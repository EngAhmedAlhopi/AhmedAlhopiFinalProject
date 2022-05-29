<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Favorite;
use App\Models\Purchase;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request)
    {
        $categories = Categorie::all();
        $found = true;
        $user = User::find(auth()->user()->id);
        return view('user.profile', compact('categories', 'user', 'found'));
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
        $user = User::find($request->id);
        return view('user.profile', compact('user', 'categories'));
    }

    public function addCart(Request $request)
    {
        $purchase = new Purchase();
        $purchase->user_id = auth()->user()->id;
        $purchase->product_id = $request->id;
        $purchase->created_at = now();
        $purchase->save();
        return redirect()->back();
    }

    public function addFavorite(Request $request)
    {
        $favorite = new Favorite();
        $favorite->user_id = auth()->user()->id;
        $favorite->product_id = $request->id;
        $favorite->created_at = now();
        $favorite->save();
        return redirect()->back();
    }

    public function indexPurchase()
    {
        $categories = Categorie::all();
        $user = User::find(auth()->user()->id);
        $found = true;
        $i = 0;
        $purchases = DB::table('products')->join('purchases', 'products.id', '=', 'purchases.product_id')->join('users', 'users.id', '=', 'purchases.user_id')->where('user_id', auth()->user()->id)->select('products.id', 'products.name', 'products.prise', 'products.picture', 'purchases.created_at', 'purchases.updated_at')->get();
        return view('user.purchases', compact('categories', 'purchases', 'i', 'user', 'found'));
    }

    public function indexFavorite()
    {
        $categories = Categorie::all();
        $user = User::find(auth()->user()->id);
        $found = true;
        $favorites = DB::table('products')->join('favorites', 'products.id', '=', 'favorites.product_id')->join('users', 'users.id', '=', 'favorites.user_id')->where('user_id', auth()->user()->id)->select('products.id', 'products.name', 'products.prise', 'products.picture', 'products.description')->get();
        return view('user.favorite', compact('categories', 'favorites', 'user', 'found'));
    }

    public function resetPassword(Request $request)
    {
        // dd($request);
        $user1 = User::find(auth()->user()->id);
        $categories = Categorie::all();
        $found = true;
        $result = 'Try to enter a password that is difficult to guess.';
        if ($user1->password == Hash::make($request->oldpass)) {
            if ($request->newpass == $request->rpass) {
                User::where('id', auth()->user()->id)->update([
                    'password' => Hash::make($request->newpass)
                ]);
                $user = User::find(auth()->user()->id);
                return view('user.profile', compact('result', 'user', 'categories', 'found'));
            } else {
                $user = User::find(auth()->user()->id);
                $result = 'Passwords do not match!';
                return view('user.chpassword', compact('user', 'categories', 'result', 'found'));
            }
        } else {
            $user = User::find(auth()->user()->id);
            $result = 'The old password is wrong!';
            return view('user.chpassword', compact('user', 'categories', 'result', 'found'));
        }
        // if ($request->newpass != $request->rpass) {
        //     $user = User::find(auth()->user()->id);
        //     $result = 'Passwords do not match!';
        //     return view('user.chpassword', compact('user', 'categories', 'result','found'));
        // }
    }

    // public function call()
    // {
    //     $categories = Categorie::all();
    //     $found = false;
    //     if (Auth::check()) {
    //         $user = User::find(auth()->user()->id);
    //         $found = true;
    //         return view('user.contact', compact('user', 'categories', 'found'));
    //     } else {
    //         $user = [
    //             'name' => ' ',
    //             'email' => ' '
    //         ];
    //         return view('user.contact', compact('user', 'categories', 'found'));
    //     }
    // }

    // public function send(Request $request){
    //     $message = new Message();
    //     $message->name = $request->name;
    //     $message->email = $request->email;
    //     $message->message = $request->message;
    //     $message->save();
    //     return redirect()->back();
    // }
}
