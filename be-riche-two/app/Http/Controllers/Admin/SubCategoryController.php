<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategorie;

class SubCategoryController extends Controller
{
    public function AllSubCategories(){
        $sub_categories = SubCategorie::latest()->get();

        
        return view('Admin.allsubcategories',compact('sub_categories'));
    }
    
    public function AddSubCategory(){
        $sub_categories = Category::latest()->get();
        return view('Admin.addsubcategory',compact('sub_categories'));
    }
    public function StoreSubCategory(Request $request){
        $request->validate([
            'name' =>'required|unique:sub_categories',
            'category_id' => 'required'
        ]);
        $category_id = $request->category_id;
        $category_name =Category::where('id',$category_id)->value('category_name');

        SubCategorie::insert([
            'name' =>$request->name,
            'slug'=>strtolower(str_replace(' ','-',$request->name)),
            'category_id' =>$category_id,
        ]);
        Category::where('id',$category_id)->increment('subcategory_count',1);
        return redirect()->route('allsubcategories')->with('message','Sub Category Added Succefully');
    }

    public function EditSubCategory($id){
        $sub_categories = SubCategorie::findOrFail($id);
        return view('Admin.editsubcategory',compact('sub_categories'));
    }
    public function UpdateSubCategory(Request $request){
        $id = $request->id;

        $request->validate([
            'name' => 'required|unique:sub_categories',
        ]);
    
        SubCategorie::where('id', $id)->update([
            'name' => $request->name,
        ]);
    
        return redirect()->route('allsubcategories')->with('message', 'SubCategory has been updated successfully');
    }
    public function DeleteSubCategory($id){
        SubCategorie::findOrFail($id)->delete();
        return redirect()->route('allsubcategories')->with('message','SubCategory has been  Deleted Succefully');
    }
}
