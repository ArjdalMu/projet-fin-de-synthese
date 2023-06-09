<?php

namespace App\Http\Controllers\Seller;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function Index(){
        $user_id = Auth::user()->id;
        $products = Product::with('orders')->where('user_id', $user_id)->get();
        $products_items = Product::with('orders')->where('user_id', $user_id)->paginate(5);

        return view ('seller.dashboard',compact('products','products_items'));
    }
    public function logout()
    {
        Auth::logout();

        // Redirect to desired page after logout
        return redirect()->route('home');
    }

    public function showprofile(){

        $user_id = Auth::user()->id;

        $order = Order::latest()->with('product')->where('user_id', $user_id)->paginate(5);

        
        $user = User::where('id', $user_id)->latest()->first();

        return view('homepage.profile',compact('user','order'));
    }

      

}
