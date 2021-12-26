@extends('layouts.app')

@section('content')


<div class="container">

        
        <div class="row pt-5"> 
        <div class="col-3 pt-3">
        @if($profile != null)
            <img class="rounded-circle" width="150" src="/storage/{{ $profile->image}}">
        @endif
            <br><br>
            <h3 class="nameCSS1"><strong>{{ ucfirst($user->name) }}</strong></h3>
            <span><strong>{{$restaurantscount}}</strong> restaurants</span>
            
            @if($profile != null)
                <div class="pt-1">{{$profile->description}}</div>
                <div class="row pt-2"></div>
                <a class="anchor" href="/profile/edit" class="pt-3">Update profile</a>
            @else
            
                <div class="pt-3"><a class="anchor" href="/profile/create" class="pt-3">Create your profile!</a></div>
            @endif
            <div class="pt-3"><a class="anchor" href="/restaurant/create" class="pt-3">Add a Restaurant</a></div>       
        </div>

            <div class="col-8">
        @foreach($restaurants as $restaurant)
        <div class="boxup row pt-5">
            <div class="col-5">
                <a href="/restaurant/{{$restaurant->id}}">
                    <img src="/storage/{{$restaurant->image}}" class="w-100">
                </a></div>
            <div class="col-5">
            <h3 class="nameCSS2"> {{ ucfirst($restaurant->restname) }} </h3>
            <h5> {{ ucfirst($restaurant->restdescription) }} </h5>
            <h5 class="postalCSS"> {{ $restaurant->postal }} </h5>
            
            
            <a href="/restaurant/{{ $restaurant->id }}/edit"><button class="btn btn-outline-warning">Edit restaurant details</button> </a>
            <div class="row pt-1"></div>
            <div class="form-group row">
                <form id="restdelete" action="{{ route('restaurant.destroy',['restaurant' => $restaurant->id]) }}" enctype="multipart/form-data" method="post">
                @csrf
                {{ method_field("DELETE")}}
                <div class ="form-group">
                <button type="submit" class="btn btn-outline-warning">Delete Restaurant</button>
                </div>
                </form>
                </div>
        
            </div>

        </div>
        <div class="row pt-2"></div>
        @endforeach
        </div>
        
</div>
@endsection
