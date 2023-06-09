<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Index(){
        $categoriesCount = Category::get()->count();
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->count();
        $product = Product::count();
        return view('Admin.dashboard',compact('users','categoriesCount','product'));
    }
    public function AllUsers(){
        $users = User::latest()
    ->whereDoesntHave('roles', function ($query) {
        $query->where('name', 'admin');
    })
    ->with('roles')
    ->get();
    
        return view('Admin.users',compact('users'));
    }

    public function logout()
    {
        Auth::logout();

        // Redirect to desired page after logout
        return redirect()->route('home');
    }

    
    
}
