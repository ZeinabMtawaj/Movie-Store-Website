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
    <form method="POST" action="/users/{{$user->id}}/update_role">
    @csrf
    @method('PUT')
    <div class="mb-6">
      
        <div class="mb-6">
            <label for="role_id" class="inline-block text-lg mb-2">
              role
            </label>
            <select id="role_id" name="role_id" class="border border-gray-200 rounded p-2 w-full"
             >
              <option value="1" @if($user->role_id==1) selected @endif >Admin</option>
              <option value="2" @if($user->role_id==2) selected @endif>User</option>
              <option value="3" @if($user->role_id==3) selected @endif>Critic</option>
            </select >
            @error('role_id')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>



    <div class="mb-6">
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          <pre>    Edit    </pre>
        </button>
      </div>

    </form>
</div>
</div>
</main>
  @endsection