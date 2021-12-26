<?php

namespace App\Http\Controllers;

use App\Review;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'comments' => 'required',
            'rating' => ['required', 'integer', 'max:5'],
            'spent' => 'required',
            
        ]);

        $user = Auth::user();
        $review = new Review();
        
        $review->user_id = $user->id;
        $review->restaurant_id = request('restaurant_id');
        $review->comments = request('comments');
        $review->rating = request('rating');
        $review->spent = request('spent');
        $saved = $review->save();

        if($saved){
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show($reviewID)
    {
        $review = Review::where('id', $reviewID)->first();
        $user = Auth::user();
        
        return view('review.show', [
            'review' => $review,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit($reviewID)
    {
        $review = Review::where('id', $reviewID)->first();
        $user = Auth::user();
        
        return view('review.edit', [
            'review' => $review,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update($reviewID)
    {
        $data = request()->validate([
            'comments' => 'required',
            'rating' => 'required',
            'spent' => 'required',
            //'restpic' => ['required', 'image'],
        ]);

        $user = Auth::user();
        $review = Review::where('id', $reviewID)->first();
        //$imagePath = request('restpic')->store('uploads', 'public');
        
        $review->comments = request('comments');
        $review->rating = request('rating');
        $review->spent = request('spent');
        //$review->image = $imagePath;

        $updated = $review->save();

        if($updated){
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $user = Auth::user();
        if (Gate::forUser($user)->allows('delete-review', $review)) {
            $review->delete();
            return back();
        }
        if (Gate::forUser($user)->denies('delete-review', $review)) {
            abort(403);
        }
       
    }
}
