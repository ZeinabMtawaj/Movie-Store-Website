@extends('layout')
@section('content')
@include('partials._intro')
@include('partials._search')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
<!-- <?php foreach ($listing as $s): ?>
<h1><?php echo $s['id']; ?></h1>
<p><?php echo $s['title']; ?></p>
    <?php endforeach; ?> -->

{{-- @php 
$test = 1;
@endphp
{{$test}} --}}

@if (count($listing) == 0)
<p> no listing found </p>
@else
@foreach ($listing as $s)
<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no_image.jpg')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listing/{{$s['id']}}">{{$s['title']}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">Acme Corp</div>
            <div class="star-widget">
                <label for="rate-5" class="fas fa-star"></label>
                <label for="rate-4" class="fas fa-star"></label>
                <label for="rate-3" class="fas fa-star"></label>
                <label for="rate-2" class="fas fa-star"></label>
                <label for="rate-1" class="fas fa-star"></label>
              </div>

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> Boston,
                MA
            </div>
        </div>
    </div>
</div>



    {{-- <h1>
        {{$s['id']}}
    </h1>
    <p>
        {{$s['title']}}
    </p> --}}
@endforeach
@endif

{{-- <h2>{{$find['title']}} </h2> --}}

{{-- <div class="mt-6 p-4">
    {{$listing->links()}}
    </div> --}}
    
@endsection