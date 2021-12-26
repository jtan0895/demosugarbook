@extends('layouts.app')

@section('content')

<div class="container">     
<div class="row pt-5"> 
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
                
                </div>
            </div>
            @endforeach
    </div>
</div>
</div>
        

@endsection