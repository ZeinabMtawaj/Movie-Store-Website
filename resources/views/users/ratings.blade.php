@extends('layout')
@section('content')
<div display="block">
  @auth
  @if(auth()->user()->role_id==1)
  <nav class="flex justify-between items-center mb-4">
    <ul class="flex space-x-6 mr-6 text-lg">
      <li>
        <a href="/import_rating" class="hover:text-laravel"
            ><i class="fa-solid fa-plus-circle"></i> Import Rating
            </a
        >
    </li>
  </ul>
  </nav>
  @endif
  @endauth
  </div>
<div class="bg-gray-50 border border-gray-200 rounded p-6">
<header>
    <h1 class="text-3xl text-center font-bold my-6 uppercase">
      My Ratings
    </h1>
  </header>

  <table class="w-full table-auto rounded-sm">
    <tbody>
      @unless($ratings->isEmpty())
      @php
      $j=0;
      @endphp
      @foreach($ratings as $rating)
      <tr class="border-gray-300">
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
          <a href="/movie/{{$movies_ids[$j]}}"> {{$movies_titles[$j]}} </a>
        </td>
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <div class="star-widget">
                    <input type="radio" name="rating" id="rate-5{{$rating->id}}" class="btns" value="5">
                    <label for="rate-5" class="fas fa-star"  @if($rating->rating >=5) style="color:#f46981" @endif></label>
                    <input type="radio" name="rating" id="rate-4{{$rating->id}}" class="btns" value="4">
                    <label for="rate-4" class="fas fa-star"  @if($rating->rating >=4) style="color:#f46981" @endif></label>
                    <input type="radio" name="rating" id="rate-3{{$rating->id}}" class="btns" value="3">
                    <label for="rate-3" class="fas fa-star"  @if($rating->rating >=3) style="color:#f46981" @endif></label>
                    <input type="radio" name="rating" id="rate-2{{$rating->id}}" class="btns" value="2">
                    <label for="rate-2" class="fas fa-star"  @if($rating->rating >=2) style="color:#f46981" @endif></label>
                    <input type="radio" name="rating" id="rate-1{{$rating->id}}" class="btns" value="1">
                    <label for="rate-1" class="fas fa-star"  @if($rating->rating >=1) style="color:#f46981" @endif></label>
                      {{-- <header></header> --}}
            </div>
          </td>
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
          <a href="/movie/{{$movies_ids[$j]}}" class="text-blue-400 px-6 py-2 rounded-xl"><i
              class="fa-solid fa-pen-to-square"></i>
            Edit</a>
        </td>
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
          <form method="POST" action="/ratings/{{$rating->id}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
          </form>
        </td>
      </tr>
      @php
      $j++;
      @endphp
      {{-- <script>
        document.getElementById('rate-{{$rating->rating}}{{$rating->id}}').checked=true;

        </script> --}}
      @endforeach
      @else
      <tr class="border-gray-300">
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
          <p class="text-center">No ratings Found</p>
        </td>
      </tr>
      @endunless

    </tbody>
  </table>
  {{-- <div class="mt-6 p-4">
    {{$ratings->links()}}
    </div> --}}
    
  @endsection