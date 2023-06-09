@extends('seller.dashboard_template')


@section('seller')
<main class="relative z-0 flex-1 pb-8 px-6 bg-white">
    
<!-- Start block -->
<div style="margin-top: 70px">
        <section class="bg-white dark:bg-gray-900 p-3 sm:p-5 antialiased">
            <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    @if (session()->has('message'))
                    <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                      <p>{{session()->get('message')}}</p>
                    </div>
            
                @endif
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                       

                        <div class="flex-1 flex items-center space-x-2">
                            <h5>
                                <span class="text-gray-500">All Products:</span>
                                <span class="dark:text-white">123456</span>
                            </h5>
                            
                            
                        </div>
                       
                    </div>
                    <div class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                        <div class="w-full md:w-1/2">
                            
                        </div>
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <a href="{{route('addproduct')}}" id="createProductButton" data-modal-toggle="createProductModal" class="flex items-center justify-center text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Add product
                            </a>
                           
                            <div id="filterDropdown" class="z-10 hidden px-3 pt-1 bg-white rounded-lg shadow w-80 dark:bg-gray-700 right-0">
                               
                                <div class="pt-3 pb-2">
                                   
                                </div>
                                <div id="accordion-flush" data-accordion="collapse" data-active-classes="text-black dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                    <!-- Category -->
                                   
                                    <div id="category-body" class="hidden" aria-labelledby="category-heading">
                                        <div class="py-2 font-light border-b border-gray-200 dark:border-gray-600">
                                            
                                        </div>
                                    </div>
                                    <!-- Price -->
                                    <h2 id="price-heading">
                                        <button type="button" class="flex items-center justify-between w-full py-2 px-1.5 text-sm font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700" data-accordion-target="#price-body" aria-expanded="true" aria-controls="price-body">
                                           
                                        </button>
                                    </h2>
                                    <div id="price-body" class="hidden" aria-labelledby="price-heading">
                                        <div class="flex items-center py-2 space-x-3 font-light border-b border-gray-200 dark:border-gray-600"><select id="price-from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"><option disabled="" selected="">From</option><option>$500</option><option>$2500</option><option>$5000</option></select><select id="price-to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"><option disabled="" selected="">To</option><option>$500</option><option>$2500</option><option>$5000</option></select></div>
                                    </div>
                                    <!-- Worldwide Shipping -->
                                    <h2 id="worldwide-shipping-heading">
                                       
                                    </h2>
                                    <div id="worldwide-shipping-body" class="hidden" aria-labelledby="worldwide-shipping-heading">
                                        
                                    </div>
                                    <!-- Rating -->
                                    <h2 id="rating-heading">
                                        
                                    </h2>
                                    <div id="rating-body" class="hidden" aria-labelledby="rating-heading">
                                        <div class="py-2 space-y-2 font-light border-b border-gray-200 dark:border-gray-600">
                                            <div class="flex items-center">
                                               
                                            </div>
                                            <div class="flex items-center">
                                                
                                            </div>
                                            <div class="flex items-center">
                                               
                                            </div>
                                            <div class="flex items-center">
                                                
                                            </div>
                                            <div class="flex items-center">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                   
                                    <th scope="col" class="p-4">Product</th>
                                    <th scope="col" class="p-4">Category</th>
                                    <th scope="col" class="p-4">Stock</th>
                                    
                                    <th scope="col" class="p-4">Rating</th>
                                    <th scope="col" class="p-4">Sales</th>
                                    <th scope="col" class="p-4">Revenue</th>
                                    <th scope="col" class="p-4">Last Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center mr-3">
                                            <img src="{{asset($item->product_image)}}" alt="iMac Front Image" class="h-8 w-auto mr-3">
                                            {{$item->product_name}}
                                        </div>
                                    </th>
                                    <td class="px-4 py-3">
                                        <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300"> {{ $item->category->category_name }}</span>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            <div class="h-4 w-4 rounded-full inline-block mr-2 {{$item->quantity < 5 ? 'bg-red-400' : 'bg-green-400'}}"></div>
                                            {{$item->quantity}}
                                        </div>
                                    </td>
                                    
                                    
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
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
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-gray-400 mr-2" aria-hidden="true">
                                                <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                                            </svg>
                                            @php
                                                 $totalSales = $item->orders->sum('quantity');
                                            @endphp
                                                       
                                                    
                                                    {{ $totalSales }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">@php
                                        $totalPrice = $item->orders->sum('total_price');
                                   @endphp    $ {{$totalPrice}}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center space-x-4">
                                            <a href="{{route('editproduct',$item->id)}}" data-drawer-target="drawer-update-product" data-drawer-show="drawer-update-product" aria-controls="drawer-update-product" class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                </svg>
                                                Edit
                                            </a>
                                            <a href="{{route('singleproduct',$item->id)}}" data-drawer-target="drawer-read-product-advanced" data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced" class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                </svg>
                                                Preview
                                            </a>
                                            <a href="{{route('deleteproduct',$item->id)}}" data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>  
                                
                                @endforeach                      
                            </tbody>
                        </table>

                        @if ($products->isEmpty())
                            <h1 class="p-4 text-l font-semi-bold">
                                No product added
                            </h1>
                        @endif
                    </div>
                    
                    
                    
                </div>
                
                <div class="flex items-center justify-between pt-4">
                    {{ $products->links() }}
                </div>
                
                

               
            </div>
        </section>
</div>

        


</main>
@endsection