@extends('layout')
@section('content')
<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
       inser files to the database
    </h2>
    <p class="mb-4">please put new users here</p>
</header>

<form method="POST" action="/upload_{{$thing}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label for="file" class="inline-block text-lg mb-2">
            file
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="file"
        />
    </div>

    <div class="mb-6">
      <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
        submit
      </button>
    </div>
</form>
</div>

@endsection