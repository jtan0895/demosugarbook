<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(){
        $data = request()->validate([
            'restname' => 'required',
            'restdescription' => 'required',
            'postal' => 'required',
            'restpic' => ['required', 'image'],
        ]);

        $user = Auth::user();
        $restaurant = new Restaurant();
        $imagePath = request('restpic')->store('uploads', 'public');
        
        $restaurant->user_id = $user->id;
        $restaurant->restname = request('restname');
        $restaurant->restdescription = request('restdescription');
        $restaurant->postal = request('postal');
        $restaurant->image = $imagePath;
        $saved = $restaurant->save();

        if($saved){
            return redirect('/profile');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show($restaurantID){
        $restaurant = Restaurant::where('id', $restaurantID)->first();
        $user = Auth::user();
        
        return view('restaurant.show', [
            'restaurant' => $restaurant,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit($restaurantID)
    {
        $user = Auth::user();
        $restaurant = Restaurant::where('id', $restaurantID)->first();
        return view('restaurant.edit', [
            'restaurant' => $restaurant
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update($restaurantID)
    {
        $data = request()->validate([
            'restdescription' => 'required',
            'postal' => 'required',
            'restpic' => ['required', 'image'],
            
        ]);

        $user = Auth::user();
        $restaurant = Restaurant::where('id', $restaurantID)->first();

        $restaurant->restdescription = request('restdescription');
        $restaurant->postal = request('postal');

        if(request()->has('restpic')){
            $imagePath = request('restpic')->store('uploads', 'public');
            $restaurant->image = $imagePath;
        }

        $updated = $restaurant->save();

        if($updated){
            return redirect('/profile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
       return redirect('profile');
    }
}
