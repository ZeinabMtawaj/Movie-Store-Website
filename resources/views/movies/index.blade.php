@extends('layout')
@section('content')
@auth
    @if (!auth()->user()->recommended)

        @include('partials._recommendation')    
    @endif

    <section class="thumbSection">
                <div class="thumbTiles swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
    
    
    
                        @php
                           $i=0; 
                        @endphp
                        @foreach ($movie_ids as $moviee)
                        <div class="swiper-slide">
                            <a class="thumbTile" href="/movie/{{$moviee}}">
                                @if ($movie_posters[$i])
                                <img class="thumbTile__image" style="height:170;width:120px" 
                                    src="{{asset('storage/'.$movie_posters[$i])}}"
                                    alt="poster">                                    
                                @else
                            <img class="thumbTile__image" style="height:170;width:120px" 
                                    src="{{asset('images/no_image.jpg')}}"
                                    alt="poster">   
                                @endif
                            </a>
                        </div>
                        @php
                            $i++; 
                        @endphp
                        @endforeach
    
    
    
    
                    </div>
    
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </section>
    {{-- </div> --}}
    
    
    <script>
            var mySwiper = new Swiper('.swiper-container', {
                // Optional parameters
                spaceBetween: 5,
                slidesPerView: 2,
                loop: true,
                freeMode: true,
                loopAdditionalSlides: 5,
                speed: 500,
                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    // when window width is >= 640px
                    640: {
                        slidesPerView: 8,
                        slidesPerGroup: 5,
                        freeMode: false
                    }
                }
            })
        </script>
@else
    @include('partials._intro')
@endauth
@include('partials._search')
<div class="lg:grid lg:grid-cols-8 gap-4 space-y-4 md:space-y-0 mx-4">
<!-- <?php foreach ($movie as $s): ?>
<h1><?php echo $s['id']; ?></h1>
<p><?php echo $s['title']; ?></p>
    <?php endforeach; ?> -->

{{-- @php 
$test = 1;
@endphp
{{$test}} --}}

@if (count($movie) == 0)
<p> no movie found </p>
@else
@foreach ($movie as $s)
{{-- <a href="/movie/{{$s['id']}}"> --}}
<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div ><a href="/movie/{{$s['id']}}">
        @if ($s['poster_path'])
        <img
            class="hidden w-48 mr-6 md:block" 
            src="{{asset('storage/'.$s['poster_path'])}}"
            alt="poster"
            id={{$s['id']}}
        />
        @else
        <img
            class="hidden w-48 mr-6 md:block" 
            src="{{asset('images/no_image.jpg')}}"
            alt="poster"
        />
        @endif
    </a>
        <div>
            <h3 class="text-2xl">
                <a href="/movie/{{$s['id']}}" class="text-lg mt-2 hover:text-purple-400">{{$s['original_title']}}</a>
            </h3>
            @auth
            @if(auth()->user()->role_id == 3)

            <div>
            <form method="POST" action="/movies/{{$s['id']}}/vote">
                @csrf
                <button type="submit" ><i class="fa fa-thumbs-up" id="like" 
                     @if (in_array($s['id'],$movies_vote))  style="color:#b6486b" @endif
                    ></i></button>
            </form>
        </div>
            @endif
            @endauth
           
            {{-- <div class="text-xl font-bold mb-4">Acme Corp</div> --}}
            {{-- <div class="star-widget">
                <label for="rate-5" class="fas fa-star"></label>
                <label for="rate-4" class="fas fa-star"></label>
                <label for="rate-3" class="fas fa-star"></label>
                <label for="rate-2" class="fas fa-star"></label>
                <label for="rate-1" class="fas fa-star"></label>
              </div> --}}
              

            
        </div>
    </div>
    {{-- </a> --}}
</div>








{{-- <script>

      
    // const API_KEY = "api_key=ddae3d9d702970f2735f5ff6bef9ab10";
    IMG_URL = "https://image.tmdb.org/t/p/w500";
    function getMovies(url) {
        lastUrl = url;
        var IMG_URL = "https://image.tmdb.org/t/p/w500";
            fetch(url).then(res => res.json()).then(data => {
            //   console.log(data);
              const {poster_path} = data;
              document.getElementById('{{$s->id}}').src = IMG_URL + poster_path;
    })}
    
    POST_BASE ="https://api.themoviedb.org/3/movie/"+"{{$s['id']}}"+"?"+"api_key=ddae3d9d702970f2735f5ff6bef9ab10";
    
    getMovies(POST_BASE);

   
    </script> --}}
















    {{-- <h1>
        {{$s['id']}}
    </h1>
    <p>
        {{$s['title']}}
    </p> --}}
@endforeach
@endif


{{-- <h2>{{$find['title']}} </h2> --}}
@if($paginate)
<div class="mt-6 p-4">
    {{$movie->links()}}
    </div>
@endif
@endsection

