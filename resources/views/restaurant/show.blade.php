@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
        <img src="/storage/{{ $restaurant->image }}" class="w-100"> 
    
        <!--<a href="/restaurant/{{ $restaurant->id }}/edit" class="pt-3"> Edit restaurant details </a>
        <form id="restdelete" action="{{ route('restaurant.destroy',['restaurant' => $restaurant->id]) }}" enctype="multipart/form-data" method="post">
            
            @csrf
            {{ method_field("DELETE")}}
            <div class ="form-group">
            <a href="#" onclick="myFunction()"> Delete </a>
            </div>
            </form>-->
        </div>
        <div class="col-4">
            <h1> {{ $restaurant->restname }} </h1>
            <h3> {{ $restaurant->restdescription }} </h3>
            <h3> {{ $restaurant->postal }} </h3>                     
        </div>
    </div>
    <!--<script>
            function myFunction() {
                document.getElementById("restdelete").submit();
            }
        </script>-->
</div>
@endsection