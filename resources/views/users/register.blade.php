@extends('layout')
@section('content')
<main>
    <div class="mx-4">
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Register
                </h2>
                <p class="mb-4">Create an account to get movies</p>
            </header>
    <form method="POST" action="/users">
    @csrf
    <div class="mb-6">
      <label for="name" class="inline-block text-lg mb-2"> Name </label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}" />

      @error('name')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="email" class="inline-block text-lg mb-2">Email</label>
      <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />

      @error('email')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>




    <div class="mb-6">
      <label for="age" class="inline-block text-lg mb-2">
        age
      </label>
      <input type="number" class="border border-gray-200 rounded p-2 w-full" name="age"
        value="{{old('age')}}" />

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
        <option value="male" id="M">Male</option>
        <option value="female" id="F" >Female</option>
      </select >
      @error('gender')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>









    <div class="mb-6">
      <label for="password" class="inline-block text-lg mb-2">
        Password
      </label>
      <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
        value="{{old('password')}}" />

      @error('password')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="password2" class="inline-block text-lg mb-2">
        Confirm Password
      </label>
      <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
        value="{{old('password_confirmation')}}" />

      @error('password_confirmation')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>


    

    <div class="mb-6">
      <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
        Sign Up
      </button>
    </div>

    <div class="mt-8">
      <p>
        Already have an account?
        <a href="/login" class="text-laravel">Login</a>
      </p>
    </div>
  </form>
</div>
</div>
</main>
{{-- <script>
document.getElementById({{old('gender')}}).checked=true;
  </script> --}}
  @endsection