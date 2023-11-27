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
            {{-- <h3 class="text-2xl mb-2">{{$movie->original_title}}</h3> --}}
            <h3 class="text-2xl mb-2">Name: {{$user->name}}</h3>
            <h3 class="text-2xl mb-2">Email: {{$user->email}}</h3>
            <h3 class="text-2xl mb-2">Age: {{$user->age}}</h3>
            <h3 class="text-2xl mb-2">Gender: {{$user->gender}}</h3>


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


@endsection