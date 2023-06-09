@extends('homepage.layouts.template')
@section('homecontent')
<main class="relative z-0 flex-1 pb-8 px-6 bg-white" style="margin-top: 150px">
    <div class="antialiased">
        @if ($errors->any())
            
    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium"></span><ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
      </div>
    @endif
        <div class="flex items-center bg-grey-100 shadow-lg">
            @foreach ($product as $item)
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
                <div class="flex flex-col md:flex-row -mx-4">
                    <div class="md:flex-1 px-4">
                        <div x-data="{ image: 1 }" x-cloak>
                            <div class="h-64 md:h-80 rounded-lg mb-4">
                                <div x-show="image === 1"
                                    class="h-64 md:h-80 rounded-lg mb-4 flex items-center justify-center">
                                    <img src="{{asset($item->product_image)}}" class="h-64 md:h-80" alt="">
                                </div>
                            </div>
                            <div class="flex -mx-2 mb-4">
                                <template x-for="i in 4">
                                    <div class="flex-1 px-2">
                                        <button x-on:click="image = i"
                                            :class="{ 'text-indigo-500': image >= i }"
                                            class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                            <span x-text="i" class="text-2xl"></span>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex-1 px-4">
                        <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                            {{$item->product_name}}</h2>
                        <p class="text-gray-500 text-sm">By <a href="{{route('profile.show',$item->user->id)}}"
                                class="text-indigo-600 hover:underline">{{$item->user->name}}</a></p>
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
                            <p class="text-gray-500 text-sm">Uploaded At <a href="#"
                                    class="text-indigo-600 hover:underline">{{$item->updated_at}}</a></p>
                        </div>

                        <div id="rating-stars" class="flex items-center space-x-2 mt-5">
                            <i class="far fa-star text-yellow-500 text-2xl cursor-pointer"></i>
                            <i class="far fa-star text-yellow-500 text-2xl cursor-pointer"></i>
                            <i class="far fa-star text-yellow-500 text-2xl cursor-pointer"></i>
                            <i class="far fa-star text-yellow-500 text-2xl cursor-pointer"></i>
                            <i class="far fa-star text-yellow-500 text-2xl cursor-pointer"></i>
                        </div>

                        <form action="{{route('rateproduct',$item->id)}}" id="rating-form"  method="POST" class="mt-5">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            
<label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Comment</label>
<textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..." name="comment"></textarea>

                            <input type="hidden" name="rating" id="rating-input" name='rating' value="0">
                            <button type="submit"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-md mt-5">Submit Rating</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>


<script>
    // Get all the star icons
    const stars = document.querySelectorAll("#rating-stars i");
    const ratingInput = document.getElementById("rating-input");
    
    // Add event listener to each star
    stars.forEach((star, index) => {
      star.addEventListener("click", () => {
        // Check if the clicked star is already filled
        const isFilled = star.classList.contains("fas");
    
        // Toggle the filled state of stars
        stars.forEach((star, i) => {
          if (i <= index) {
            star.classList.remove("far");
            star.classList.add("fas");
          } else {
            star.classList.remove("fas");
            star.classList.add("far");
          }
        });
    
        // Set the selected rating value
        const rating = isFilled ? index : index + 1;
        ratingInput.value = rating;
      });
    });
    </script>
@endsection



