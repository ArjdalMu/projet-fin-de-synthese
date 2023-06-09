<?php

namespace App\Http\Controllers\Seller;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $sub_categories = SubCategorie::latest()->get();
        return view ('seller.addproduct',compact('categories','sub_categories'));
    }
    public function History(){
        $user_id = Auth::user()->id;
        $products = Product::with(['category', 'orders'])->where('user_id', $user_id)->latest()->paginate(5);
        return view('seller.history', compact('products'));
        
    }


    public function StoreProduct(Request $request){
        $request->validate([
            'product_name' => 'required|string',
            'product_description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:sub_categories,id',
            
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('product_image');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_image->move(public_path('upload'),$img_name);
        $img_url = 'upload/'.$img_name;
        $category_id = $request->category_id;
        $subcategory_id = $request->subcategory_id;

        Product::create([
            'product_name'=>$request->product_name,
            'product_image'=>$img_url,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'product_description'=>$request->product_description,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'user_id' => Auth::user()->id,
            'slug'=>strtolower(str_replace(' ','-',$request->product_name)),
            

            
        ]);
        Category::where('id',$category_id)->increment('product_count',1);
        SubCategorie::where('id',$subcategory_id)->increment('product_count',1);
        return redirect()->route('history')->with('message','Product Added Succefully');
    }

    public function EditProduct($id){
        $categories = Category::latest()->get();
        $sub_categories = SubCategorie::latest()->get();
        $product = Product::findOrFail($id);
        return view('seller.editproduct',compact('product','categories','sub_categories'));
    }

    public function UpdateProduct(Request $request){

        $productid = $request->id; 

        $request->validate([
            'product_name' => 'required|string',
            'product_description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:sub_categories,id',
            
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('product_image');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_image->move(public_path('upload'),$img_name);
        $img_url = 'upload/'.$img_name;
        $category_id = $request->category_id;
        $subcategory_id = $request->subcategory_id;

        Product::findOrFail($productid)->update([
            'product_name'=>$request->product_name,
            'product_image'=>$img_url,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'product_description'=>$request->product_description,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'user_id' => Auth::id( ),
            'slug'=>strtolower(str_replace(' ','-',$request->product_name)),
        ]);

        return redirect()->route('history')->with('message','Product Has Been Updated  Succefully');
    }

    public function SingleProduct($id){
        $product = Product::with('category', 'subCategory','reviews')->where('id', $id)->get();
        return view('seller.singleproduct',compact('product'));
    }

    public function DeleteProduct($id){
        Product::findOrFail($id)->delete();
        return redirect()->route('history')->with('message','Product has been  Deleted Succefully');
    }
}
