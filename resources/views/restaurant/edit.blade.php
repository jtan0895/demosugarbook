@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
        <h1> {{ ucfirst($restaurant->restname) }} </h1></div>
            <div class="col-4">
            <form action="/restaurant/{{ $restaurant->id }}" enctype="multipart/form-data" method="post">
                   
                @csrf
                {{ method_field("PATCH")}}
                    <div class="form-group row">
                        <label for="restdescription">Description</label>
                        <input class="form-control" type="text" name="restdescription" id="restdescription" value="{{ $restaurant->restdescription }}">
                    </div>

                    <div class="form-group row">
                        <label for="restpic">Picture</label>
                        <input type="file" name="restpic" id="restpic" value="{{ $restaurant->image }}">
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="btn btn-outline-warning">Update Restaurant</button>
                    </div>       
                </form>
                
            </div>
        
    </div>
</div>
@endsection