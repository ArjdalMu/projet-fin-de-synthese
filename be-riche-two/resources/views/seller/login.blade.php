@extends('seller.layouts.sellerauth_template')

@section('authcontent')
<div class="bg-white dark:bg-gray-900">
    <div class="flex justify-center h-screen">
        <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url(https://images.unsplash.com/photo-1616763355603-9755a640a287?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80)">
            <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                <div>
                    <h2 class="text-4xl font-bold text-white">Brand</h2>
                    
                    <p class="max-w-xl mt-3 text-gray-300">Lorem ipsum dolor sit, amet consectetur adipisicing elit. In autem ipsa, nulla laboriosam dolores, repellendus perferendis libero suscipit nam temporibus molestiae</p>
                </div>
            </div>
        </div>
        
        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
            <div class="flex-1">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white">
                        <div class="text-center">
                            <img src="{{asset('upload/logo2.png')}}" class="w-20 mx-auto" alt="">
                        </div>
                    </h2>
                    <p class="mt-3 text-gray-500 dark:text-gray-300">Sign in to access your account</p>
                </div>
                
                <div class="mt-8">
                    <form method="POST" action="{{ route('seller.auth') }}">
                        @csrf
                        <div>
                            <label for="email" :value="__('Email')" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email Address</label>
                            <input id="email"  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between mb-2">
                                <label for="password" :value="__('Password')" class="text-sm text-gray-600 dark:text-gray-200">Password</label>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                
                            </div>

                            <input id="password" 
                
                            type="password" name="password" id="password" placeholder="••••••••"  required autocomplete="current-password" placeholder="Your Password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            @if (Route::has('password.request'))
                <a href="#" class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline" href="{{ route('password.request') }}" >{{ __('Forgot your password?') }} </a>
        
        @endif
                        </div>

                        <div class="mt-6">
                            <button
                            type="submit"
                                class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                {{ __('Log in') }}
                            </button>
                        </div>

                    </form>

                    <p class="mt-6 text-sm text-center text-gray-400">Don&#x27;t have an account yet? <a href="{{route('seller.register')}}" class="text-blue-500 focus:outline-none focus:underline hover:underline">Sign up</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection