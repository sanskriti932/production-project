<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <!-- Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Edu+NSW+ACT+Foundation:wght@400..700&family=Imbue:opsz,wght@10..100,100..900&display=swap');

        .font-family-imbue {
            font-family:"Dosis", sans-serif;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 font-family-imbue flex flex-col min-h-screen">
    <header class="header sticky top-0 bg-white shadow-md flex items-center justify-between px-8 py-2 z-50">
        <h1 class="w-3/12 lg:w-1/12">
            <a href="{{ url('/') }}">
                <img class="w-20 h-20" src="{{asset('img/ACCESSORIES-removebg-preview.png')}}" alt="App Logo">
            </a>
        </h1>

        <div class="lg:hidden">
            <button id="burger-menu" class="text-gray-600 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <nav class="hidden lg:flex lg:w-6/12 justify-center">
            @include('layouts.stationeryfrontendcomponent.stationeryfrontnavbar')
        </nav>

        <div class="lg:w-3/12 lg:flex justify-end items-center hidden">
            <form action="/search" class="lg:w-6/12 flex items-center">
                <div class="form-group">
                    <input type="text" name="query" class="form-control search-box" placeholder="Search">
                </div>
                <button>
                    <a href="#">
                        <svg class="h-8 p-1 hover:text-[#b3ab78] duration-200" aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16 fa-9x">
                            <path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z">
                            </path>
                        </svg>
                    </a>
                </button>
            </form>
            <a href="{{url('stationerycart')}}">
                <svg class="h-8 p-1 hover:text-[#b3ab78] duration-200" aria-hidden="true" focusable="false" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-shopping-cart fa-w-18 fa-7x">
                    <path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z" class=""></path>
                </svg>
            </a>
            <div class="relative inline-block text-left">
                <div>
                    <button type="button" id="dropdownButton" class="inline-flex items-center justify-center w-8 h-8 p-1 text-black hover:text-[#b3ab78] focus:outline-none focus:text-[#b3ab78] z-10">
                        <svg class="h-6 w-6  hover:text-[#b3ab78] duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 9V7a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="9" r="3"></circle>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 21v-1a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v1"></path>
                        </svg>
                    </button>
                </div>
                <div id="dropdownContent" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-20">
                    <div class="py-1">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#b3ab78]">Login</a>
                        @endif

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#b3ab78]">Register</a>
                        @endif
                        @else
                        <button @click="openDropdown = !openDropdown" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#b3ab78] focus:outline-none">
                        </button>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#b3ab78]">Logout</a>
                        <a href="{{url('cust-order')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#b3ab78]">My Orders</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                        @endguest
                        <!-- End Authentication Links -->
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="responsive-nav" class="lg:hidden hidden">
        @include('layouts.stationeryfrontendcomponent.stationeryfrontnavbar')

        <form action="/searchstationery" class="flex items-center space-x-4 my-4">
            <div class="flex-grow">
                <input type="text" name="query" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:border-[#b3ab78]" placeholder="Search">
            </div>
            <button>
                <a href="{{url('searchstationery')}}" class="hover:text-[#b3ab78] duration-200">
                    <svg class="h-8 p-1" aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16 fa-9x">
                        <path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z">
                        </path>
                    </svg>
                </a>
            </button>
        </form>

        <a href="{{url('stationerycart')}}" class="nav-link">
            <svg class="h-8 p-1 hover:text-[#b3ab78] duration-200" aria-hidden="true" focusable="false" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-shopping-cart fa-w-18 fa-7x">
                <path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z" class=""></path>
            </svg>
        </a>
        <div class="relative inline-block text-left">
            <button type="button" id="dropdownButton" class="inline-flex items-center justify-center w-8 h-8 p-1 text-black hover:text-[#b3ab78] focus:outline-none focus:text-[#b3ab78] z-10">
                <svg class="h-6 w-6 hover:text-[#b3ab78] duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 9V7a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="9" r="3"></circle>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 21v-1a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v1"></path>
                </svg>
            </button>

            <div id="dropdownContent" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-20">
                <div class="py-1">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#b3ab78]">Login</a>
                    @endif

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#b3ab78]">Register</a>
                    @endif
                    @else
                    <button @click="openDropdown = !openDropdown" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#b3ab78] focus:outline-none">
                        {{ Auth::user()->name }}
                    </button>

                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#b3ab78]">Logout</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('profile-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#b3ab78]">My Profile</a>
                    <a href="{{url('cust-order')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#b3ab78]">My Orders</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                    @endguest
                    <!-- End Authentication Links -->
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <div>
        @include('layouts.stationeryfrontendcomponent.stationeryfrontendfooter')
    </div>
    <script>
        document.getElementById('dropdownButton').addEventListener('click', function() {
            var dropdownContent = document.getElementById('dropdownContent');
            dropdownContent.classList.toggle('hidden');
        });
    </script>
    <script>
        document.getElementById('burger-menu').addEventListener('click', function() {
            document.getElementById('responsive-nav').classList.toggle('hidden');
        });
    </script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('status'))
    <script>
        Swal.fire({
            text: "{{ session('status') }}",
            icon: 'success'
        });
    </script>
    @endif
    @yield('scripts')

</body>
</html>