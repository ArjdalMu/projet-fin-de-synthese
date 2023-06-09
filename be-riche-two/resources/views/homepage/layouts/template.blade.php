
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>eco time</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>@yield('page_title')</title>
    <!-- Styles -->
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,300&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')


    <style>
        .hero-bg-image{
            background: url('https://wallpaperaccess.com/full/2483946.jpg');
            background-attachment: fixed;
                
            background-size: cover;
   
    
    height: 600px;
        }
        body{
        min-height: 100vh;
  display: flex;
  flex-direction: column;
       }
      
      .footer {
        margin-top: auto;
        width: 100%;
       
        padding: 10px;
        text-align: center;
      }
    </style>
</head>
<body >
  <!-- Include Font Awesome CDN -->
<!-- Include Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Include Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<nav
class='ps-12 bg-white border-b shadow-sm fixed top-0 z-10 w-full'>
<div class="container mx-auto px-4">
  <div class="flex justify-between items-center py-4">
    <div class="text-black text-lg font-bold">
        <a href="/">
            <img src="{{asset('upload/logo2.png')}}" alt="Logo" class="w-10">
          </a>
          
    </div>
    <div class="flex items-center">
        @guest
            <a href="{{ route('buyer.login') }}" class="text-white text-sm px-4 py-2 rounded-md bg-blue-500 hover:bg-blue-600">
                Login
            </a>
            <a href="{{ route('buyer.register') }}" class="text-blue-700 text-sm px-4 py-2 rounded-md border border-blue-700 hover:text-white hover:bg-blue-700 ml-4">
                Sign Up
            </a>
        @else
        <div class="relative inline-block text-left ms-4">
            @php
                $categories = App\Models\Category::latest()->get()
            @endphp
            <button type="button" id="categories-btn" class="flex items-center text-blue-500 text-sm px-4 py-2 rounded-md hover:text-blue-600">
                <span>Categories</span>
                <i class="fas fa-chevron-down ml-1"></i>
            </button>
            <div id="categories-menu" class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="categories-btn">
                    @foreach ($categories as $item)
                        <a href="{{ route('productcategory', $item->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">{{ $item->category_name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        
        <a href="{{ route('mycart') }}" class="flex items-center text-blue-500 text-sm hover:text-blue-600 ml-4">
            <i class="fas fa-shopping-cart text-xl"></i>
        </a>
        
        <a href="{{ route('buyer.profile') }}" class="text-blue-500 hover:text-blue-700 ml-4">
            <i class="fas fa-user-circle fa-lg text-xl"></i>
        </a>
        
        <a href="{{ route('logout') }}" class="text-red-500 text-sm px-4 py-2 rounded-md hover:text-white hover:bg-blue-500 ml-4"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           <i class="fa-solid fa-right-from-bracket"></i>
        </a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
        @endguest
    </div>
    

    
    
    
    </div>
  </div>
</div>
</nav>











    
   <div class="w-ful">
    @yield('homecontent')
   </div>
    
<footer class="bg-white rounded-lg shadow border-t dark:bg-gray-900 borderb footer">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0">
                <img src="{{asset('upload/logo2.png')}}" class="h-10 mr-3" alt="Beriche Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                @php
                $categories = App\Models\Category::latest()->get()
            @endphp
                @foreach ($categories as $item)
                <li>
                    <a href="{{ route('productcategory', $item->id) }}" class="mr-4 hover:underline md:mr-6">{{$item->category_name}}</a>
                </li>
            @endforeach
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="/" class="hover:underline">BeRiche</a>. All Rights Reserved.</span>
    </div>
</footer>







<script>

        const categoriesBtn = document.getElementById('categories-btn');
        const categoriesMenu = document.getElementById('categories-menu');

        categoriesBtn.addEventListener('click', function() {
            categoriesMenu.classList.toggle('hidden');
        });



        document.getElementById('profile-icon').addEventListener('click', function () {
        document.getElementById('profile-links').classList.toggle('hidden');
    });

  


    
</script>

</body>




  
  