@extends('seller.dashboard_template')




@section('seller')



<main class="relative z-0 flex-1 pb-8 px-6 bg-white">
    <div class="grid pb-10  mt-4 ">
        <!-- Start Content-->
          <div class="mb-2">
            <p class="text-lg font-semibold text-gray-400">Dashboard</p>
          </div>
          
            
          
          <div class="grid grid-cols-1 gap-2 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 mt-3">
            <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
              style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                <div class="absolute inset-0 bg-pink-900 bg-opacity-75 transition duration-300 ease-in-out"></div>
                <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center justify-center">
                  <div>
                    <h3 class="text-center text-white text-lg">
                         Products Added
                    </h3>
                    <h3 class="text-center text-white text-3xl mt-2 font-bold">
                         {{$products->count()}}
                    </h3>
                    <div class="flex space-x-4 mt-4">
                       
                    </div>
                  </div>
                </div>
            </div>
             <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
              style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                <div class="absolute inset-0 bg-yellow-600 bg-opacity-75 transition duration-300 ease-in-out"></div>
                  <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
                  <div>
                    <div class="text-white text-lg flex space-x-2 items-center">
                      <div class="bg-white rounded-md p-2 flex items-center">
                        <i class="fas fa-toggle-off fa-sm text-yellow-300"></i>
                      </div>
                      <p>Orders</p>
                    </div>
                    @php
                    $totalOrders = 0;
                   
                
                    foreach ($products as $product) {
                        $totalOrders += $product->orders->count();
                
                       
                    }
                @endphp

                      <h3 class="text-white text-3xl mt-2 font-bold">
                          Total Orders: {{$totalOrders}}
                      </h3>

                    
                  </div>
                </div>
            </div>
             <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
              style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                <div class="absolute inset-0 bg-blue-900 bg-opacity-75 transition duration-300 ease-in-out"></div>
                <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
                  <div>
                    <div class="text-white text-lg flex space-x-2 items-center">
                      <div class="bg-white rounded-md p-2 flex items-center">
                        <i class="fas fa-clipboard-check fa-sm text-blue-800"></i>
                      </div>
                      <p>Revenu</p>
                    </div>
                    @php
                    $totalPrice = 0;
                                  foreach ($products as $product) {
                  foreach ($product->orders as $order) {
                      $totalPrice += $order->total_price;
                  }
              }
                    @endphp
                    


                
                <h3 class="text-white text-3xl mt-2 font-bold">
                    {{$totalPrice}} $
                </h3>
                
                    
                  </div>
                </div>
            </div>        
          </div>
          
        <!-- End Content-->
        <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
            <h6>Orders History</h6>
          </div>
          <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
              <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                <thead class="align-bottom">
                  <tr>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Buyer</th>
                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Quantity</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Price</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Date</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products_items as $product)
                  @foreach ($product->orders as $order)
                      <?php
                          $buyer = App\Models\User::find($order->user_id);
                          $buyerName = $buyer ? $buyer->name : 'Unknown';
                          $buyerEmail = $buyer ? $buyer->email : 'Unknown';
                          $buyerProfile = $buyer ? $buyer->photo : '';
                      ?>
                      <tr>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <div class="flex px-2 py-1">
                                  <div>
                                    @if(!empty($buyerProfile))
                                    <img src="{{asset($buyerProfile)}}" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-sm h-9 w-9 rounded-xl" alt="user1" />
                    
                  @else
                    <img alt="Profile Image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/2048px-Circle-icons-profile.svg.png" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-sm h-9 w-9 rounded-xl">
                  @endif
                                      
                                      
                                  </div>
                                  <div class="flex flex-col justify-center">
                                      <h6 class="mb-0 leading-normal text-sm">{{ $buyerName }}</h6>
                                      <p class="mb-0 leading-tight text-xs text-slate-400">{{ $buyerEmail }}</p>
                                  </div>
                              </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                           
                                  
                               
                               
                              <p class="mb-0 leading-tight text-xs text-slate-400">{{$order->quantity}}</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <span class="font-semibold leading-tight text-xs text-slate-400">{{$order->total_price}} $</span>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                              <span class="font-semibold leading-tight text-xs text-slate-400">{{$order->updated_at}}</span>
                          </td>
                      </tr>
                  @endforeach
              @endforeach
              
                </tbody>
                
              </table>
             
            </div>
            <div class="mt-5">
              {{$products_items->links()}}
            </div>
          </div>
        </div>
    </div>
</main>
@endsection