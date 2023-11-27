@extends('layout')
@section('content')
@include('partials._search')
<div display="block">
<nav class="flex justify-between items-center mb-4">
  <ul class="flex space-x-6 mr-6 text-lg">
    <li>
      <a href="/movies/creat" class="hover:text-laravel"
      ><i class="fa-solid fa-plus-circle"></i> Add Movie
      </a
  >
    </li>
    <li>
      <a href="/import_movie" class="hover:text-laravel"
          ><i class="fa-solid fa-plus-circle"></i> Import Movie
          </a
      >
  </li>
</ul>
</nav>
</div>
<div class="bg-gray-50 border border-gray-200 rounded p-6">
<header>
    <h1 class="text-3xl text-center font-bold my-6 uppercase">
      Manage Movies
    </h1>
  </header>
  
    

  <table class="w-full table-auto rounded-sm">
    <tbody>
      @unless($movies->isEmpty())
      @foreach($movies as $movie)
      <tr class="border-gray-300">
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
          <a href="/movies/{{$movie->id}}"> {{$movie->original_title}} </a>
        </td>
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
          <a href="/movies/{{$movie->id}}/editt" class="text-blue-400 px-6 py-2 rounded-xl"><i
              class="fa-solid fa-pen-to-square"></i>
            Edit</a>
        </td>
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
          <form method="POST" action="/moviies/{{$movie->id}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
          </form>
        </td>
      </tr>
     
      @endforeach
     
      @else
      <tr class="border-gray-300">
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
          <p class="text-center">No movies Found</p>
        </td>
      </tr>
      @endunless

    </tbody>
  </table>
  @unless($movies->isEmpty())
  <div class="mt-6 p-4">
    {{$movies->links()}}
    </div>
    @endif
  @endsection