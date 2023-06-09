@extends('homepage.layouts.template')
@section('homecontent')

<section style="margin-top: 150px">
  <div class="text-center">
    <h1 class="font-light mt-5 mb-5 text-2xl">{{$categories->category_name}}</h1>
    <div class="flex flex-wrap justify-center">
      @foreach ($products as $item)
      <div class="bg-white p-4 rounded-lg shadow-md w-64 m-4">
        <img src="{{ asset($item->product_image) }}" alt="Product 1" class="w-full h-40 object-cover rounded-md mb-4">
        <h3 class="text-xl font-semibold">{{ Illuminate\Support\Str::limit($item->product_name, 15) }} ...</h3>
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
    
</section>

@endsection
