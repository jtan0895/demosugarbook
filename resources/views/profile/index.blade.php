@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-2 pt-3">
        @if($profile != null)
            <img class="rounded-circle" width="150" src="/storage/{{ $profile->image}}">
        @endif
        </div>
        <div class="col-7 pt-3">
            <h3>{{$user->name}}</h3>
            <span><strong>{{$restaurantscount}}</strong> restaurants</span>
            @if($profile != null)
                <div class="pt-3">{{$profile->description}}</div>
                <a href="/profile/edit" class="pt-3">Update your profile!</a>
            @else
                <div><a href="/profile/create" class="pt-3">Create your profile!</a></div>
            @endif
            <div class="pt-2"><a href="/restaurant/create" class="btn btn-warning">Add a Restaurant</a></div>       
        </div>
    </div>

    
        @foreach($restaurants as $restaurant)
        <div class="row pt-5">
            <div class="col-5">
                <a href="/restaurant/{{$restaurant->id}}">
                    <img src="/storage/{{$restaurant->image}}" class="w-100">
                </a></div>
            <div class="col-5">
            <!--<span><strong>{{$restaurantscount}}</strong> restaurants</span>-->

            </div>

        </div>
        @endforeach
    
</div>
@endsection
