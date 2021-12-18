@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
    <img src="/storage/{{ $restaurant->image }}" class="w-100"> 
        </div>
        <div class="col-4">
            <h2>{{ $user->name }} </h2>
            <h1> {{ $restaurant->restname }} </h1>
        </div>
        
                <a href="/restaurant/{{ $restaurant->id }}/edit" class="pt-3">Edit restaurant details</a>
        
        <form action="{{ route('restaurant.destroy',['restaurant' => $restaurant->id]) }}" enctype="multipart/form-data" method="post">
            
            @csrf
            {{ method_field("DELETE")}}
            <div class ="form-group row">
            <button type="submit" class="btn btn-primary">Delete</button>
            </div>
            </form>

    </div>
</div>
@endsection