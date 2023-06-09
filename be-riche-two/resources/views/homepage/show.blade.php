@extends('homepage.layouts.register_template')

@section('authcontent')

<!-- component -->
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<main class="profile-page">
  <!-- component -->
<style>
  :root {
      --main-color: #4a76a8;
  }

  .bg-main-color {
      background-color: var(--main-color);
  }

  .text-main-color {
      color: var(--main-color);
  }

  .border-main-color {
      border-color: var(--main-color);
  }
</style>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



<div class="bg-white shadow">
    <div class="flex items-center justify-center">
        <img class="w-20 h-20 rounded-full" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80" alt="User Image">
    </div>
    <div class="text-center py-4">
        <h2 class="text-xl font-semibold">{{$user->name}}</h2>
        <p class="text-gray-600">{{$user->email}}</p>
        @php
            use Carbon\Carbon;

            $date = Carbon::parse($user->updated_at)->format('F j, Y');
        @endphp
        <p class="text-gray-500">Joined: {{$date}}</p>
        
    </div>
</div>

<h2 class="text-2xl font-semibold mt-8">Product Added</h2>

<div class="flex flex-wrap justify-center">
    @foreach ($user->products as $item)
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


@endsection