@extends('layout')
@section('content')
<div display="block">
  <nav class="flex justify-between items-center mb-4">
    <ul class="flex space-x-6 mr-6 text-lg">
      <li>
        <a href="/import_user" class="hover:text-laravel"
            ><i class="fa-solid fa-plus-circle"></i> Import User
            </a
        >
    </li>
  </ul>
  </nav>
  </div>
<div class="bg-gray-50 border border-gray-200 rounded p-6">
<header>
    <h1 class="text-3xl text-center font-bold my-6 uppercase">
      Manage Users
    </h1>
  </header>

  <table class="w-full table-auto rounded-sm">
    <tbody>
      @unless($users->isEmpty())
      @foreach($users as $user)
      <tr class="border-gray-300">
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
          <a href="/user/{{$user->id}}"> {{$user->name}} </a>
        </td>
        @auth
        @if (auth()->user()->role_id == 1)
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
          <a href="/users/{{$user->id}}/edit_role" class="text-blue-400 px-6 py-2 rounded-xl"><i
              class="fa-solid fa-pen-to-square"></i>
            Edit Role </a>
        </td>
        @endif
        @endauth
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
          <form method="POST" action="/users/{{$user->id}}">
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
          <p class="text-center">No users Found</p>
        </td>
      </tr>
      @endunless

    </tbody>
  </table>
  <div class="mt-6 p-4">
    {{$users->links()}}
    </div>
  @endsection