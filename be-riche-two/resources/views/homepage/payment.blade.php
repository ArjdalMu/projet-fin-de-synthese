


@extends('homepage.layouts.template')
@section('homecontent')
<div class="flex flex-col items-center justify-center mb-4 ">

  <section style="margin-top: 180px">
    
    <div class="max-w-3xl mx-auto rounded overflow-hidden shadow-lg">
      <div class="px-10 py-10">
        <div class="font-bold text-xl mb-2">
          <h1 class="text-center uppercase text-3xl mt-2">Checkout</h1>
        </div>
        
        <h2 class=" text-lg font-light text-gray-900 dark:text-white m-5">Order Summary:</h2>
        
        <div class="relative overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3 rounded-l-lg">
                      Product name
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Qty
                  </th>
                  <th scope="col" class="px-6 py-3 rounded-r-lg">
                      Price
                  </th>
              </tr>
          </thead>
    <tbody>
        @php
$total = 0
@endphp
      @foreach ($cart_items as $item)
      <tr class="border-b p-8">
          <td class="p-4 px-6 text-center whitespace-nowrap">
         
              <h3>{{$item->product->product_name}}</h3>
           
          </td>
          <td class="p-4 px-6 text-center whitespace-nowrap">{{$item->quantity}}</td>
          <td class="p-4 px-6 text-center whitespace-nowrap">{{$item->price}}</td>
          
      </tr>
      @php
      $total = $total +  $item->price
  @endphp
      @endforeach
      
      
    </tbody>
  </table>
</div>

        
        <div class="pt-10">
          <h2>Total: {{$total}} $</h2>
        </div>
      </div>
      <form  action="{{ route('checkout.create', ['amount' => $total]) }}" method="POST" >
        @csrf

        <div class="px-6  pb-2">
          <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-2 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 mb-5">
            
            <i class="fa-brands fa-paypal mr-2"></i>
            Pay With Paypal
          </button>
          
          
        </div>
      </form>
      
    </div>



    
  </section>


  
  


    
</div>

@endsection