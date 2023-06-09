<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;


use Illuminate\Http\Request;
use Illuminate\Validation\Rules;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class SellerAuthController extends Controller
{
    public function showlogin(){
        return view('seller.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('sellerdashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->attachRole('seller');

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('sellerdashboard');
    }
    public function showRegister(){
        return view('seller.register');
    }
}
