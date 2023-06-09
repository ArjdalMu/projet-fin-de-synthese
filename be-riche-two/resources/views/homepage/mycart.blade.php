@extends('homepage.layouts.template')
@section('homecontent')

      <section class="mb-40" style="margin-top: 150px">
        


        
        <div class="container p-8 mx-auto mt-12">
          @if (session()->has('message'))
            <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
              <p>{{session()->get('message')}}</p>
            </div>
    
        @endif
            <div class="w-full overflow-x-auto">
              <div class="my-2">
                <h3 class="text-xl font-bold tracking-wider">Shopping Cart {{$cart->count()}} items</h3>
              </div>
              <table class="w-full shadow-inner">
                <thead>
                  <tr class="bg-gray-100">
                    <th class="px-6 py-3 font-bold whitespace-nowrap">Image</th>
                    <th class="px-6 py-3 font-bold whitespace-nowrap">Product</th>
                    <th class="px-6 py-3 font-bold whitespace-nowrap">quantity</th>
                    <th class="px-6 py-3 font-bold whitespace-nowrap">Price</th>
                    <th class="px-6 py-3 font-bold whitespace-nowrap">Remove</th>
                  </tr>
                </thead>
                <tbody>
                    @php
    $total = 0
@endphp
                  @foreach ($cart as $item)
                  <tr class="border-b p-8">
                    <td>
                        <div class="flex justify-center">
                          <img src="{{asset($item->product->product_image)}}"
                            class="object-cover h-28 w-28 rounded-2xl" alt="image" />
                        </div>
                      </td>
                      <td class="p-4 px-6 text-center whitespace-nowrap">
                        <div class="flex flex-col items-center justify-center">
                          <h3>{{$item->product->product_name}}</h3>
                        </div>
                      </td>
                      <td class="p-4 px-6 text-center whitespace-nowrap">{{$item->quantity}}</td>
                      <td class="p-4 px-6 text-center whitespace-nowrap">{{$item->price}}</td>
                      <td class="p-4 px-6 text-center whitespace-nowrap">
                        <a href="{{route('removeitem',$item->id)}}">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                        </a >
                      </td>
                  </tr>
                  @php
                  $total = $total +  $item->price
              @endphp
                  @endforeach
                  
                  
                </tbody>
              </table>
              <div class="lg:w-2/4">
                <div class="mt-4">
      
                </div>
              </div>
            </div>
            <div class="mt-4">
              <div class="py-4 rounded-md shadow">
                <div
                  class="flex items-center justify-between px-4 py-2 mt-3  border-gray-300">
                  <span class="text-xl font-bold">Total</span>
                  <span class="text-2xl font-bold">${{$total}}</span>
                </div>
              </div>
            </div>
            <div class="mt-5 text-end" style="padding-top: 10px">
              @if ($cart->count() > 0)
              <a href="{{route('checkout')}}" class="p-4 text-center text-white bg-blue-500 rounded-md shadow hover:bg-blue-600">
                Proceed to Checkout
              </a>
              @else
              <button disabled class="p-4 text-center text-white bg-gray-300 rounded-md shadow cursor-not-allowed">
                Proceed to Checkout
              </button>
              @endif
            </div>
            
          </div>
        
      </section>

    

@endsection
