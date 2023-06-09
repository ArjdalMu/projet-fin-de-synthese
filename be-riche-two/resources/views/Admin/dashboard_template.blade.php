
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<head>
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

    <link href="../resource/css/app.css" rel="stylesheet">
</head>
<body >
    <div class="flex h-screen w-full bg-gray-800 " x-data="{openMenu:1}">
        <!--Start SideBar-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="flex flex-col bg-gray-200 h-screen w-16">
  <a href="{{route('admindashboard')}}" class="flex items-center justify-center h-16 hover:bg-gray-300">
    <i class="fas fa-chart-bar text-gray-700"></i>
  </a>
  <a href="{{route('allusers')}}" class="flex items-center justify-center h-16 hover:bg-gray-300">
    <i class="	fas fa-users text-gray-700"></i>
  </a>
  <a href="{{route('allcategories')}}" class="flex items-center justify-center h-16 hover:bg-gray-300">
    <i class="fa fa-folder text-gray-700"></i>
  </a>
  <a href="{{route('allsubcategories')}}" class="flex items-center justify-center h-16 hover:bg-gray-300">
    <i class="fa fa-folder-open text-gray-700"></i>
  </a>
  
  
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <a href="" class="flex items-center justify-center h-16 hover:bg-gray-300">
      <button type="submit"><i class="fas fa-sign-out-alt text-gray-700"></i></button>
    </a>
</form>
</div>



        <div class="flex flex-col flex-1 w-full overflow-y-auto">

          <main class="relative z-0 flex-1 pb-8 px-6 bg-white">
              <div class="grid pb-10  mt-4 ">
                  <!-- Start Content-->
                 @yield('admin')
              </div>
          </main>
        </div>
    </div>
</body>
  
