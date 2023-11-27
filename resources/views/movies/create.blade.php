@extends('layout')
@section('content')
<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Add Movie
    </h2>
    <p class="mb-4">Info</p>
</header>

<form method="POST" action="/moviess" enctype="multipart/form-data">
    @csrf

    <div class="mb-6">
        <label
            for="original_title"
            class="inline-block text-lg mb-2"
            >Original Title</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="original_title"
            value="{{old('original_title')}}"
        />
        @error('original_title')
            <p class="text-red-500 text-xs mt-1">{{$message}} </p>
        
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="genre"
            class="inline-block text-lg mb-2">Genre</label>
        


            @php $j=0; @endphp
            @foreach ($genres as $genre)
            @if(fmod($j, 4)==0)
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @php $k=1; @endphp 
            @endif
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="{{$genre}}" type="checkbox" name="genres[]" value="{{$genre}}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="{{$genre}}" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{$genre}}</label>
                    </div>
                </li> 
                @if(fmod($k, 4)==0)               
                    </ul>
                @endif
                @php $j++; @endphp
                @php $k++; @endphp 
            @endforeach

        @error('genre')
            <p class="text-red-500 text-xs mt-1">{{$message}} </p>
        @enderror
    </div>

    

    <div class="mb-6">
        <label
            for="overview"
            class="inline-block text-lg mb-2"
        >
        Overview
        </label>
        <textarea
            class="border border-gray-200 rounded p-2 w-full"
            name="overview"
            rows="10"
            placeholder="Include story, events, plot, etc"
            
        >{{old('overview')}}</textarea>
        @error('overview')
            <p class="text-red-500 text-xs mt-1">{{$message}} </p>
        
        @enderror
    </div>


    <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">
            Movie Poster
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="logo"
        />
    </div>



    

    
    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Add
        </button>

       
    </div>
</form>
</div>
@endsection