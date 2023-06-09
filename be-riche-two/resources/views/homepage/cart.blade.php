@extends('homepage.layouts.template')
@section('homecontent')
<div class="flex flex-col items-center justify-center mb-4 ">

  <section class='mb-40' style="margin-top: 150px">
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
    
        @php
    $total = 0;
    @endphp
    
    @foreach ($product as $item)
        
   
    <div class="antialiased">
        <div class="flex items-center bg-gray-100 shadow-lg">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
            <div class="flex flex-col md:flex-row -mx-4">
              <div class="md:flex-1 px-4">
                <div x-data="{ image: 1 }" x-cloak>
                  <div class="h-64 md:h-80 rounded-lg mb-4">
                    <div x-show="image === 1" class="h-64 md:h-80 rounded-lg mb-4 flex items-center justify-center">
                      <img src="{{ asset($item->product_image) }}" class="h-64 md:h-80" alt="">
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
                <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">{{ $item->product_name }}</h2>
                
      
                <div class="flex items-center space-x-4 my-4">
                  <div>
                    <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                      <span class="text-indigo-400 mr-1 mt-1">$</span>
                      <span class="font-bold text-indigo-600 text-3xl">{{ $item->price }}</span>
                    </div>
                  </div>
                  <div class="flex-1">
                    <p class="text-green-500 text-xl font-semibold">{{ $item->category->category_name }}</p>
                    <p class="text-gray-400 text-sm">{{ $item->subcategory->name }}</p>
                  </div>
                </div>
      
                <p class="text-gray-500">{{ $item->product_description }}</p>
                <div class="mt-5">
                  <p class="text-gray-500 text-sm">Uploaded At <a href="#" class="text-indigo-600 hover:underline">{{ $item->updated_at }}</a></p>
                </div>
                <form action="{{route('addproducttocart',$item->id)}}" method="POST">
                    @csrf
                <div class="mt-6 flex items-center">
                    <input value="{{$item->id}}" name="product_id" class="hidden">
                    <input value="{{$item->price}}" name="price" class="hidden">
                    <input type="number" name="quantity" id="quantityInput" class="mr-4 py-2 px-4 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600" placeholder="Quantity" min="1" onchange="updateTotal(this.value, {{ $item->price }}, {{ $item->quantity }})">
                    <button type="submit" id="buyNowButton" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md" disabled>Add To Cart</button>
                  </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>

      @php
      $total += $item->price;
      @endphp
      
      @endforeach

      <div class="mt-10">
        <h3 id="totalAmount" class="text-2xl font-bold text-gray-800">Total: ${{ $total }}</h3>
      </div>
    
      
  </section>
    
</div>

<script>
function updateTotal(quantity, price, availableQuantity) {
  const totalAmountElement = document.getElementById('totalAmount');
  const total = parseFloat(quantity) * parseFloat(price);
  totalAmountElement.innerText = `Total: $${total}`;

  const quantityInput = document.getElementById('quantityInput');
  const buyNowButton = document.getElementById('buyNowButton');
  if (parseInt(quantity) > parseInt(availableQuantity)) {
    quantityInput.style.borderColor = 'red';
    buyNowButton.setAttribute('disabled', true);
    buyNowButton.classList.remove('bg-indigo-600');
    buyNowButton.classList.add('bg-gray-400');
  } else {
    quantityInput.style.borderColor = 'border-gray-300';
    buyNowButton.removeAttribute('disabled');
    buyNowButton.classList.remove('bg-gray-400');
    buyNowButton.classList.add('bg-indigo-600');
  }
}
</script>

@endsection
