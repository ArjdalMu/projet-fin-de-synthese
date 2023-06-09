<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function Index(){
        $categories = Category::latest()->get();
        return view('Admin.allcategories',compact('categories'));
    }
    public function AddCategory(){
        return view('Admin.addcategory');
    }  
    public function StoreCategory(Request $request){
        $request->validate([
            'category_name' =>'required|unique:categories'
        ]);

        Category::insert([
            'category_name' =>$request->category_name,
            'slug'=>strtolower(str_replace(' ','-',$request->category_name))
        ]);
        return redirect()->route('allcategories')->with('message','Category Added Succefully');
    }
    public function AllSubCategories(){
        
        return view('Admin.allsubcategories');
    }
    public function AddSubCategory(){
        $sub_categories = Category::latest()->get();
        return view('Admin.addsubcategory',compact('sub_categories'));
    }

    public function EditCategory($id){

        $categories = Category::findOrFail($id);
        return view('Admin.editcategory',compact('categories'));
    }
    
    public function UpdateCategory(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
    
        Category::where('id', $id)->update([
            'category_name' => $request->category_name,
        ]);
    
        return redirect()->route('allcategories')->with('message', 'Category has been updated successfully');
    }
    public function DeleteCategory($id){
        Category::findOrFail($id)->delete();
        return redirect()->route('allcategories')->with('message','Category has been  Deleted Succefully');
    }
    
    
}
