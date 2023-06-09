


@extends('homepage.layouts.template')
@section('homecontent')
<div class="flex flex-col items-center justify-center mb-4 ">

  <section  style="margin-top: 70px">
    <section class="bg-white dark:bg-gray-900">
      <div class="grid max-w-screen-xl px-4 py-8  lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
          <div class="mr-auto place-self-center lg:col-span-7">
              <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Unleash Your Product's Potential:</h1>
              <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Discover a new realm of possibilities for your software company with ProductMarket. Empower users to effortlessly sell and showcase their products with our intuitive payments tool.</p>
              <a href="{{route('seller.login')}}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                  Join Us
                  <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </a>
              <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                  Speak to Sales
              </a> 
          </div>
          <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
              <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup">
          </div>                
      </div>
  </section>

    <div class="bg-gray-100 py-8 rounded-lg container mx-auto">
      <h1 class="text-2xl font-bold text-center mb-4">Our Services</h1>
      <div class="flex justify-center">
        <div class="w-full max-w-4xl px-4 sm:px-8 mx-auto">
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded-lg shadow-md text-center">
              <i class="text-blue-500 text-4xl mx-auto fas fa-store-alt"></i>
              <h2 class="text-xl font-semibold mt-4">Configure Your Store</h2>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md text-center">
              <i class="text-pink-500 text-4xl mx-auto fas fa-shopping-bag"></i>
              <h2 class="text-xl font-semibold mt-4">List Your Products</h2>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md text-center">
              <i class="text-blue-400 text-4xl mx-auto fas fa-money-bill-alt"></i>
              <h2 class="text-xl font-semibold mt-4">Generate Earns</h2>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md text-center">
              <i class="text-red-500 text-4xl mx-auto fas fa-shopping-cart"></i>
              <h2 class="text-xl font-semibold mt-4">Track Your Purchases</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center">
      <h1 class="font-light mt-5 mb-5 text-2xl">Sport Collections</h1>
      <div class="flex flex-wrap justify-center">
        @foreach ($products as $item)
        <div class="bg-white p-4 rounded-lg shadow-md w-64 m-4">
          <img src="{{ asset($item->product_image) }}" alt="Product 1" class="w-full h-40 object-cover rounded-md mb-4">
          <h3 class="text-xl font-semibold">{{ Illuminate\Support\Str::limit($item->product_name, 15) }}</h3>
          <div class="flex items-center mt-2">
            @php
            $total = $item->reviews->count();
        @endphp

        @if ($total == 0)
        <span class="text-gray-600 ml-1">No reviews added</span>
        @else
        <svg class="w-4 h-4 text-yellow-500 fill-current" viewBox="0 0 20 20">
            <path d="M10 0l2.42 6.12L20 7.18l-5.63 4.65L15.45 20 10 15.66 4.55 20l1.08-8.17L0 7.18l7.58-1.06L10 0z" />
        </svg>
        
        @php
            $totalRating = 0;
            foreach ($item->reviews as $review) {
                $totalRating += $review->rating;
            }
            $averageRating = $totalRating / $total;
        @endphp
          
        <span class="text-gray-600 ml-1">{{ number_format($averageRating, 1, '.', ',')  }} ({{ $total }} reviews)</span>
        @endif
          </div>
          <div class="flex justify-between items-center mt-4">
            <a href="{{route('cart',$item->id)}}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add to Cart</a>
            <a href="{{route('myproduct',$item->id)}}" class="text-blue-500">Preview</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="text-center">
      <h1 class="font-light mt-5 mb-5 text-2xl">Smart Phone Collections</h1>
      <div class="flex flex-wrap justify-center">
        @foreach ($products_phone as $item)
        <div class="bg-white p-4 rounded-lg shadow-md w-64 m-4">
          <img src="{{ asset($item->product_image) }}" alt="Product 1" class="w-full h-40 object-cover rounded-md mb-4">
          <h3 class="text-xl font-semibold">{{ Illuminate\Support\Str::limit($item->product_name, 15) }}</h3>
          <div class="flex items-center mt-2">

            @php
    $total = $item->reviews->count();
@endphp

      @if ($total == 0)
          <span class="text-gray-600 ml-1">No reviews added</span>
      @else
          <svg class="w-4 h-4 text-yellow-500 fill-current" viewBox="0 0 20 20">
              <path d="M10 0l2.42 6.12L20 7.18l-5.63 4.65L15.45 20 10 15.66 4.55 20l1.08-8.17L0 7.18l7.58-1.06L10 0z" />
          </svg>
        
          @php
              $totalRating = 0;
              foreach ($item->reviews as $review) {
                  $totalRating += $review->rating;
              }
              $averageRating = $totalRating / $total;
          @endphp

          <span class="text-gray-600 ml-1">{{ $averageRating }} ({{ $total }} reviews)</span>
      @endif



            

          </div>
          <div class="flex justify-between items-center mt-4">
            <a href="{{route('cart',$item->id)}}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add to Cart</a>
            <a href="{{route('myproduct',$item->id)}}" class="text-blue-500">Preview</a>

          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="text-center">
      <a href="#" class="border-blue-500 text-blue-500 border px-4 py-2 rounded-md mt-5 mb-5">See More</a>

    </div>
  </section>
  


    
</div>

@endsection