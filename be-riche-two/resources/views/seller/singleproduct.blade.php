@extends('seller.dashboard_template')


@section('seller')
<main class="relative z-0 flex-1 pb-8 px-6 bg-white">

    <div style="margin-top: 70px">
        <div class="flex items-center  shadow-sm bg-gray-100 rounded-lg dark:bg-gray-900 p-3 sm:p-5 antialiased">
            
          @foreach ($product as $item)
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
            <div class="flex flex-col md:flex-row -mx-4">
              <div class="md:flex-1 px-4">
                <div x-data="{ image: 1 }" x-cloak>
                  <div class="h-64 md:h-80 rounded-lg  mb-4">
                    <div x-show="image === 1" class="h-64 md:h-80 rounded-lg mb-4 flex items-center justify-center">
                      <img src="{{asset($item->product_image)}}" class="h-64 md:h-80" alt="">
                    </div>
                  </div>
        
                  <div class="flex -mx-2 mb-4">
                    <template x-for="i in 4">
                      <div class="flex-1 px-2">
                        <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                          <span x-text="i" class="text-2xl"></span>
                        </button>
                      </div>
                    </template>
                  </div>
                </div>
              </div>
              <div class="md:flex-1 px-4">
                <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">{{$item->product_name}}</h2>
                <p class="text-gray-500 text-sm">By <a href="#" class="text-indigo-600 hover:underline">{{Auth::user()->name}}</a></p>
        
                <div class="flex items-center space-x-4 my-4">
                  <div>
                    <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                      <span class="text-indigo-400 mr-1 mt-1">$</span>
                      <span class="font-bold text-indigo-600 text-3xl">{{$item->price}}</span>
                    </div>
                  </div>
                  <div class="flex-1">
                    <p class="text-green-500 text-xl font-semibold">{{$item->category->category_name}}</p>
                    <p class="text-gray-400 text-sm">{{$item->subcategory->name}}</p>
                  </div>
                </div>
        
                <p class="text-gray-500">{{$item->product_description}}</p>
                <div class="mt-5">
                    <p class="text-gray-500 text-sm">Uploaded At <a href="#" class="text-indigo-600 hover:underline">{{$item->updated_at}}</a></p>
                </div>
                <div class="flex items-center mt-5">
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
          
        <span class="text-gray-600 ml-1">{{  number_format($averageRating, 1, '.', ',') }} ({{ $total }} reviews)</span>


        @endif
        
                
              </div>
            </div>
          </div>
          @endforeach
        </div>
        </div>

       
        
         
        
    </div>
</main>
@endsection