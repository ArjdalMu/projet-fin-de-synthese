<?php

namespace App\Http\Controllers\Buyer;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BuyerController extends Controller
{
    public function Cart(Request $request){
        $product = Product::with('category', 'subCategory')->where('id',$request->id)->get();
        return view ('homepage.cart',compact('product'));
    }


    public function AddProductToCart(Request $request){
        
        

        

        $product_price= $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;

        Cart::insert([
            'product_id'=>$request->product_id,
            'user_id'=>Auth::id(),
            'quantity'=>$request->quantity,
            'price'=>$price

        ]);
        return redirect()->route('mycart')->with('message','Your item added to cart Succefuly');
    
    }

    public function MyCart(){
        $user_id = Auth::user()->id;
        $cart = Cart::latest()->with('product')->where('user_id',$user_id)->get();
        return view('homepage.mycart', compact('cart'));

    }
    public function RemoveCartItem($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('mycart')->with('message','Your item has been  deleted from cart Succefuly');

    }

    public function logout()
    {
        Auth::logout();

        // Redirect to desired page after logout
        return redirect()->route('home');
    }
    public function category(Request $request)
    {
        $products = Product::latest()->with('reviews')->where('category_id', $request->id)->get();
        $categories = Category::latest()->where('id', $request->id)->first();
        return view('homepage.category', compact('products','categories'));
    }


    public function MyProduct(Request $request){
        $product = Product::latest()->with('user')->where('id',$request->id)->get();

        return view('homepage.singleproduct',compact('product'));
    }

    public function RateProduct(Request $request){
        $request->validate([
            'rating' => 'required|integer|min:1',
            'comment' => 'required|string|max:200',
        ]);

        $user_id = Auth::user()->id;

        Review::insert([
            'rating'=>$request->rating,
            'comment'=>$request->comment,
            'product_id'=>$request->product_id,
            'user_id'=>$user_id
        ]);

        return redirect()->route('home');
        
    }
    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'description' => 'required|string',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update name and address
    $user->name = $request->name;
    $user->adresse = $request->adresse;
    $user->description = $request->description;

    // Handle photo upload
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $photoPath = 'upload/' . $photo->getClientOriginalName();
        $photo->move(public_path('upload'), $photoPath);
        $user->photo = $photoPath;
    }
    

    $user->save();

    return redirect()->route('buyer.profile')->with('message', 'Profile updated successfully!');
}



    public function showprofile(){

        $user_id = Auth::user()->id;

        $order = Order::latest()->with('product')->where('user_id', $user_id)->paginate(5);

        
        $user = User::where('id', $user_id)->latest()->first();

        return view('homepage.profile',compact('user','order'));
    }
   
    public function editProfile(){
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->latest()->first();
        return view('homepage.profile-edit',compact('user'));
    }


    
    

    

}
