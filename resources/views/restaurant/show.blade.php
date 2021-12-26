@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-8">
            <img src="/storage/{{ $restaurant->image }}" class="w-100"> 
            </div>
            <div class="col-4">
                <h1 class="nameCSS2"> {{ ucfirst($restaurant->restname) }} </h1>
                <h4> {{ ucfirst($restaurant->restdescription) }} </h3>
                <h4> Postal:  <strong class="avg">{{ $restaurant->postal }} </strong> </h3>
                <h4> Avg Rating:  <strong class="avg">{{ $avgratings }}</strong> </h4>
                <h4> Avg Spending:  <strong class="avg">${{ $avgspent }}</strong> </h4>

            

        <div class="row pt-2">
                @if (Auth::check())
                <a class="anchor pt-3" data-bs-toggle="modal" data-bs-target="#addreview" href="#addreview"> Add review </a>
                @endif
        <!-- Modal -->
            <div class="modal fade" id="addreview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <!-- Form-->
                                <form action="{{ route('review.store') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <input class="form-control" type="hidden" name="restaurant_id" value="{{ ($restaurant->id) }}" id="restaurant_id">

                                    <div class="form-group row">
                                        <label for="comments">Comments</label>
                                        <input class="form-control" type="text" name="comments" value="{{ old('comments') }}" id="comments">
                                    </div>

                                    <div class="form-group row">
                                        <label for="rating">Ratings (Out of 5)</label>
                                        <input class="form-control" type="text" name="rating" value="{{ old('rating') }}" id="rating">
                                    </div>

                                    <div class="form-group row">
                                        <label for="spent">Amount spent</label>
                                        <input class="form-control" type="text" name="spent" value="{{ old('spent') }}"id="spent">
                                    </div>

                        </div>
                        <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-warning">Add review</button>
                                    <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Close</button>
                                    </form> 
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div> 
       
        <h2 class="pt-3"> Reviews</h2>
        @foreach($reviews as $review)
        <div class="row pt-5 boxup">
        
        <div class="col-4">
            <h6> {{ $review->comments }} </h6>
        </div>
        <div class="col-2">
            <h6> Ratings: {{ $review->rating }} </h6>
        </div>
        <div class="col-2">
            <h6> Spent: ${{ $review->spent }} </h6>
        </div>
        <div class="col-2">
            <h6> User: {{ $review->user_id }} </h6>
        </div>
        <div class="col-2">
            @if (Auth::check())
            <form id="reviewdelete" action="{{ route('review.destroy',['review' => $review->id]) }}" enctype="multipart/form-data" method="post">
                @csrf
                {{ method_field("DELETE")}}
                <div class ="form-group">
                <button type="submit" class="btn btn-outline-warning">Delete</button>
                </div>
                </form>
                
            @endif
            </div>
        </div>
        <div class="pt-1"></div>
        @endforeach
        <!--<script>
            function myFunction() {
                document.getElementById("restdelete").submit();
            }
        </script>-->
        
</div>
@endsection