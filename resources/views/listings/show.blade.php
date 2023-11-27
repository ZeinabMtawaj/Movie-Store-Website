@extends('layout')
@section('content')
{{-- @include('partials._search') --}}
{{-- <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

<h1>{{$find['title'] }}<h1> --}}
<a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
            <img
                class="w-48 mr-6 mb-6"
                {{-- src="{{asset('images/{{$movie->poster_path}}')}}" --}}
                src="{{asset('images/no_image.jpg')}}"
                alt=""
            />

            {{-- <h3 class="text-2xl mb-2">{{$movie->original_title}}</h3> --}}
            <h3 class="text-2xl mb-2">pppppppp</h3>
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
            <div class="star-widget">
                <input type="radio" name="rate" id="rate-5" class="btns" value="1">
                <label for="rate-5" class="fas fa-star"></label>
                <input type="radio" name="rate" id="rate-4" class="btns" value="2">
                <label for="rate-4" class="fas fa-star"></label>
                <input type="radio" name="rate" id="rate-3" class="btns" value="3">
                <label for="rate-3" class="fas fa-star"></label>
                <input type="radio" name="rate" id="rate-2" class="btns" value="4">
                <label for="rate-2" class="fas fa-star"></label>
                <input type="radio" name="rate" id="rate-1" class="btns" value="5">
                <label for="rate-1" class="fas fa-star"></label>
                <form method="POST" action="/ratings">
                    @csrf
                  <header></header>
                  <div class="btn">
                    <button type="submit">Post</button>
                  </div>
                </form>
              </div>

              {{-- @endauth --}}

              
            <div class="text-lg my-4">
                {{-- <i class="fa-solid fa-location-dot"></i> Daytona, FL --}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Job Description
                </h3>
                <div class="text-lg space-y-6">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Eligendi non reprehenderit
                        facilis architecto autem quam
                        necessitatibus, odit quod, repellendus
                        voluptate cum. Necessitatibus a id tenetur.
                        Error numquam at modi quaerat.
                    </p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur
                        adipisicing elit. Quaerat praesentium eos
                        consequuntur ex voluptatum necessitatibus
                        odio quos cupiditate iste similique rem in,
                        voluptates quod maxime animi veritatis illum
                        quo sapiente.
                    </p>

                    <a
                        href="mailto:test@test.com"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                        Contact Employer</a
                    >

                    <a
                        href="https://test.com"
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
    <a href="/listings/{{$s->id}}/edit" >
        <i class="fa-solid fa-pencil" ></i> Edit
    </a>
    <form method="POST" action="/listings/{{$s->id}}">
        @csrf
        @method('DELETE')
        <button class="text-red-500" ><i class="fa-solid fa-trash"></i>Delete</button>
    </form>
</div> --}}
</div>
<script>
    const btn = document.querySelector("button");
    const post = document.querySelector(".post");
    const widget = document.querySelector(".star-widget");
    const editBtn = document.querySelector(".edit");
    btn.onclick = ()=>{
      widget.style.display = "none";
      post.style.display = "block";
      editBtn.onclick = ()=>{
        widget.style.display = "block";
        post.style.display = "none";
      }
      return false;
    }
</script>

@endsection