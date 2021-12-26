@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
           <div class="titlemain">sugarbook</div>
        </div>
    </div>
    <div class="row pt-5 justify-content-center">
    <div class="col-md-8">
        <form id="query" action="{{ url('/search')}}" enctype="multipart/form-data" method="GET">
        @csrf
        <div class="input-group input-group-lg">
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="query" type="search" placeholder="Search Restaurant by Name or Postal">
        </div>
    </div></div>
    <div class="row pt-3 justify-content-center">
    <div class="col-md-2">
        <div class="input-group input-group-lg">
        <button type="submit" class="btn btn-warning">Search</button>
        </form>
        </div>
    </div></div>
</div>
@endsection