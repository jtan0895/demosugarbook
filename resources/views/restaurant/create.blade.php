@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4"></div>
            <div class="col-4">
                <form action="{{ route('restaurant.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="restname">Restaurant Name</label>
                        <input class="form-control" type="text" name="restname" id="restname">
                    </div>

                    <div class="form-group row">
                        <label for="description">Description</label>
                        <input class="form-control" type="text" name="restdescription" id="name">
                    </div>

                    <div class="form-group postal">
                        <label for="postal">Postal Code</label>
                        <input class="form-control" type="text" name="postal" id="postal">
                    </div>

                    <div class="form-group row">
                        <label for="restpic">Picture</label>
                        <input type="file" name="restpic" id="restpic">
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">Create Restaurant</button>
                    </div>       
                </form>
            </div>
        <div class="col-4"></div>
    </div>
</div>
@endsection