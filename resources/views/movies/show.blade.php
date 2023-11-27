@extends('layout')
@section('content')
{{-- @include('partials._search') --}}
{{-- <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

<h1>{{$find['title'] }}<h1> --}}
{{-- <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
</a> --}}
<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
           @if ($movie['poster_path'])
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('storage/'.$movie['poster_path'])}}"
            alt=""
            id={{$movie['id']}}
        />
        @else
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no_image.jpg')}}"
            alt=""
        />
        @endif

            {{-- <h3 class="text-2xl mb-2">{{$movie->original_title}}</h3> --}}
            <h3 class="text-2xl mb-2">{{$movie['original_title']}}</h3>
            {{-- <div class="text-xl font-bold mb-4">Acme Corp</div> --}}
            {{-- <ul class="flex">
                <li
                    class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                >
                    <a href="#">Laravel</a>
                </li>
                <li
                    class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                >
                    <a href="#">API</a>
                </li>
                <li
                    class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                >
                    <a href="#">Backend</a>
                </li>
                <li
                    class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                >
                    <a href="#">Vue</a>
                </li>
            </ul> --}}

            {{-- @auth --}}
            @auth
            <div class="star-widget">
            <div>
                <form method="POST" action="/ratings/{{$path}}">
                    @csrf
                    @if ($rating != -1)
                    @method('PUT')
                    @endif

                <input type="radio" name="rating" id="rate-5" class="btns" value="5">
                <label for="rate-5" class="fas fa-star"></label>
                <input type="radio" name="rating" id="rate-4" class="btns" value="4">
                <label for="rate-4" class="fas fa-star"></label>
                <input type="radio" name="rating" id="rate-3" class="btns" value="3">
                <label for="rate-3" class="fas fa-star"></label>
                <input type="radio" name="rating" id="rate-2" class="btns" value="2">
                <label for="rate-2" class="fas fa-star"></label>
                <input type="radio" name="rating" id="rate-1" class="btns" value="1">
                <label for="rate-1" class="fas fa-star"></label>
                  <header></header>
                  <div class="btn">
                    <button type="submit">{{$btn}}</button>  
                  </div>
                </form>
               </div>
               @if ($rating != -1)   
               <div ><br></div> 
               <div class="mt-6">
              <form method="POST" action="/ratings/{{$path}}">
              @csrf
              @method('DELETE')
               <div class="btn">
                    <button type="submit" width="100%">Delete</button> 
                  </div>
              </form>
              </div>
              @endif
             </div>
             @endauth

               @if ($rating == -1)
            <div class="text-lg my-7">
                {{-- <i class="fa-solid fa-location-dot"></i> Daytona, FL --}}
             </div> 
             @endif
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Overview
                </h3>
                <div class="text-lg space-y-6">
                    <p>
                        {{$movie['overview']}}
                    </p>
                    <h3 class="text-3xl font-bold mb-4">
                        Genre
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                            <ul class="flex"> 
                                @php
                                if ($movie['genres']){
                                $s= str_replace("'","\"",$movie['genres']);
                                $genres = json_decode($s,true);}
                                else {
                                    $genres =[];
                                }
                                @endphp
                                <ul class="flex" width="50%" style="margin:auto">
                               @foreach ($genres as $genre)
                               <li class="bg-black text-white rounded-xl px-3 py-1 mr-2" >
                               <a href="/?genre={{$genre['name']}}">{{$genre['name']}}</a>
                               </li>
                               @endforeach
                                </ul>
                        </p>
                    </ul>
                    @if($movie['similar_content']) 
                    <h3 class="text-3xl font-bold mb-4 hover:text-laravel"><a href="/movies/similar/{{$movie['id']}}">
                        Similar Content...</a>
                    </h3>
                  
                    {{-- <ul class="flex" width="50%" style="margin:auto">
                        <li class="bg-laravel text-white rounded-xl px-3 py-1 mr-2" >
                            <a href="/movies/similar/{{$movie['id']}}">Similar Content</a>
                        </li>
                    </ul> --}}
                    @endif
                    @auth
                    <a
                     href="{{ route('movies.download', $movie->id) }}"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-download"></i>
                       Download From here</a
                    >
                    @endauth

                    <a
                    
                        href="https://www.themoviedb.org/movie/{{$movie->id}}" 
                        target="_blank"
                        class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-globe"></i> Visit
                        Website</a
                    >
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="bg-gray-50 border border-gray-200 rounded p-2 mt-4 flex space-x-6 ">
    <a href="/movies/{{$s->id}}/edit" >
        <i class="fa-solid fa-pencil" ></i> Edit
    </a>
    <form method="POST" action="/movies/{{$s->id}}">
        @csrf
        @method('DELETE')
        <button class="text-red-500" ><i class="fa-solid fa-trash"></i>Delete</button>
    </form>
</div> --}}
</div>
</div>

<script type="text/javascript">
 if ({{$rating}} != -1)
    document.getElementById('rate-{{$rating}}').checked=true;

</script>




{{-- <script type="text/javascript">
    // const btn = document.querySelector("button");
    // const post = document.querySelector(".post");
    // const widget = document.querySelector(".star-widget");
    // const editBtn = document.querySelector(".edit");
    // btn.onclick = ()=>{
    //   widget.style.display = "none";
    //   post.style.display = "block";
    //   editBtn.onclick = ()=>{
    //     widget.style.display = "block";
    //     post.style.display = "none";
    //   }
    //   return false;
    // }

    // function changeColor(){
    //     if 
    // }
    if ({{$rating}} != -1)
    document.getElementById('rate-{{$rating}}').checked=true;
    IMG_URL = "https://image.tmdb.org/t/p/w500";
    function getMovies(url) {
        lastUrl = url;
        var IMG_URL = "https://image.tmdb.org/t/p/w500";
            fetch(url).then(res => res.json()).then(data => {
            //   console.log(data);
              const {poster_path} = data;
              document.getElementById('{{$movie->id}}').src = IMG_URL + poster_path;
    })}
    
    POST_BASE ="https://api.themoviedb.org/3/movie/"+"{{$movie['id']}}"+"?"+"api_key=ddae3d9d702970f2735f5ff6bef9ab10";
    
    getMovies(POST_BASE);
</script> --}}

@endsection