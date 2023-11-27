<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link rel="stylesheet" href="{{asset('css/star.css')}}">
        {{-- <script type="text/javascript" src="{{asset('js/notification.js') }}"></script> --}}
        {{-- <script type="text/javascript" src="{{asset('js/script.js') }}"></script> --}}

        <link rel="stylesheet" href="{{asset('css/recommendation.css')}}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        {{-- "#ef3b2d", --}}

        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel:	"#953553", 
                        },
                    },
                },
            };
        </script>
         {{-- @if(Session::has('download.in.the.next.request'))
         <meta http-equiv="refresh" content="5;url={{ Session::get('download.in.the.next.request') }}">
        @endif --}}
        <title>Movies</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="{{asset('images/logo.jpg')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">












                {{-- <li>
                <div class="wrapper1">
                    <div class="navbar1">
                      <div class="navbar_left">
                        <div class="logo">
                          <a href="#">Coding Market</a>
                        </div>
                      </div>
                  
                      <div class="navbar_right">
                        <div class="notifications">
                          <div class="icon_wrap"><i class="far fa-bell"></i></div>
                          
                          <div class="notification_dd">
                              <ul class="notification_ul">
                                  <li class="starbucks success">
                                      <div class="notify_icon">
                                          <span class="icon"></span>  
                                      </div>
                                      <div class="notify_data">
                                          <div class="title">
                                              Lorem, ipsum dolor.  
                                          </div>
                                          <div class="sub_title">
                                            Lorem ipsum dolor sit amet consectetur.
                                        </div>
                                      </div>
                                      <div class="notify_status">
                                          <p>Success</p>  
                                      </div>
                                  </li> 

                                </li>
                                <li class="show_all">
                                    <p class="link">Show All Activities</p>
                                </li> 




 --}}









                @auth
                <li>
                    <a href="/users/{{auth()->user()->id}}/edit" class="hover:text-laravel"><i class="fa fa-info-circle"></i>
                    {{auth()->user()->name}} Info
                    </a>
                </li>
                <li>
                    <a href="/users/{{auth()->user()->id}}/ratings" class="hover:text-laravel"
                        ><i class="fa-solid fa-star"></i> My Ratings
                        </a
                    >
                </li>
                @if (auth()->user()->role_id == 1)
                <li>
                    <a href="/users/manage" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i> Manage Users
                        </a
                    >
                </li>
                <li>
                    <a href="/movies/manage" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i> Manage Movies
                        </a
                    >
                </li>
                
                @endif
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="hover:text-laravel">
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>

                    </form>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>
        <main>
        @yield('content')
        </main>
    </body>
    {{-- <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
        <a href="create.html" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
</footer> --}}
<x-flash-message/>
</html>