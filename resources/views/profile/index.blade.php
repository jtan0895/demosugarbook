@extends('layouts.app')

@section('content')


<div class="container">

        
        <div class="row pt-5"> 
        <div class="col-3 pt-3">
        @if($profile != null)
            <img class="rounded-circle" width="150" src="/storage/{{ $profile->image}}">
        @endif
            <br><br>
            <h3>{{$user->name}}</h3>
            <span><strong>{{$restaurantscount}}</strong> restaurants</span>
            @if($profile != null)
                <div class="pt-3">{{$profile->description}}</div>
                <a href="/profile/edit" class="pt-3">Update</a>
            @else
                <div><a href="/profile/create" class="pt-3">Create your profile!</a></div>
            @endif
            <div class="pt-2"><a href="/restaurant/create" class="pt-3">Add a Restaurant</a></div>       
        </div>

            <div class="col-8">
        @foreach($restaurants as $restaurant)
        <div class="row pt-5">
            <div class="col-5">
                <a href="/restaurant/{{$restaurant->id}}">
                    <img src="/storage/{{$restaurant->image}}" class="w-100">
                </a></div>
            <div class="col-5">
            <h2> {{ $restaurant->restname }} </h2>
            <h5> {{ $restaurant->restdescription }} </h5>
            <h5> {{ $restaurant->postal }} </h5> 
            <a href="/restaurant/{{ $restaurant->id }}/edit" class="pt-3"> Edit restaurant details </a>
        <form id="restdelete" action="{{ route('restaurant.destroy',['restaurant' => $restaurant->id]) }}" enctype="multipart/form-data" method="post">
            
            @csrf
            {{ method_field("DELETE")}}
            <div class ="form-group">
            <a href="#" onclick="event.preventDefault();
                document.getElementById('restdelete').submit();"> Delete </a>
            </div>
            </form>
            </div>

        </div>
        @endforeach
        </div>
        
</div>
@endsection
