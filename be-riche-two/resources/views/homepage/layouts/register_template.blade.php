
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
    </style>
</head>
<body>
    @yield('authcontent')
</body>

