@extends('layout')
@section('content')
<main>
    <div class="mx-4">
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit
                </h2>
                <p class="mb-4">Edit My Personal Info</p>
            </header>
    <form method="POST" action="/users/{{$user->id}}">
    @csrf
    @method('PUT')
    <div class="mb-6">
      <label for="name" class="inline-block text-lg mb-2"> Name </label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{$user['name']}}" />

      @error('name')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="email" class="inline-block text-lg mb-2">Email</label>
      <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$user['email']}}" />

      @error('email')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>




    <div class="mb-6">
      <label for="age" class="inline-block text-lg mb-2">
        age
      </label>
      <input type="number" class="border border-gray-200 rounded p-2 w-full" name="age"
        value="{{$user['age']}}" />

      @error('age')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="gender" class="inline-block text-lg mb-2">
        gender
      </label>
      <select id="gender" name="gender" class="border border-gray-200 rounded p-2 w-full"
       >
        <option value="male" @if($user['gender']=="M") selected @endif>Male</option>
        <option value="female" @if($user['gender']=="F") selected @endif>Female</option>
      </select >
      @error('gender')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>









    {{-- <div class="mb-6">
      <label for="password" class="inline-block text-lg mb-2">
        Password
      </label>
      <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
        value="{{$user['password']}}" />

      @error('password')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="password2" class="inline-block text-lg mb-2">
        Confirm Password
      </label>
      <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
        value="{{$user['password']}}" />

      @error('password_confirmation')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div> --}}


    

    <div class="mb-6">
      <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
        <pre>    Edit    </pre>
      </button>
    </div>
  </form>


    <div class="mb-6">
      <form method="POST" action="users/{{$user->id}}">
        @method('DELETE')
      <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
        Delete Account
      </button>
    </form>
    </div>

    {{-- <div class="mt-8">
      <p>
        Already have an account?
        <a href="/login" class="text-laravel">Login</a>
      </p>
    </div> --}}
</div>
</div>
</main>
  @endsection