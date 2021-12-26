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
                        <input class="form-control" type="text" name="restname" value="{{ old('restname') }}" id="restname">
                    </div>

                    <div class="form-group row">
                        <label for="description">Description</label>
                        <input class="form-control" type="text" name="restdescription" value="{{ old('restdescription') }}" id="name">
                    </div>

                    <div class="form-group row">
                        <label for="postal">Postal Code</label>
                        <input class="form-control @error('postal') is-invalid @enderror" type="text" name="postal" value="{{ old('postal') }}"id="postal">

                        @error('postal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group row">
                        <label for="restpic">Picture</label>
                        <input type="file" class="@error('restpic') is-invalid @enderror" name="restpic" id="restpic">

                        @error('restpic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="btn btn-outline-warning">Create Restaurant</button>
                    </div>       
                </form>
                
            </div>
        <div class="col-4"></div>
    </div>
</div>
@endsection