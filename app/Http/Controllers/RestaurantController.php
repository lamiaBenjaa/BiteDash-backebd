<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use SebastianBergmann\GlobalState\Restorer;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::paginate(10);
        return view('pages.restaurants.index',compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:2|max:255',
            'description'=>'nullable|max:255',
            'adress'=>'required|string|max:255',
            'phone'=>'required|string|max:15',
            'openingHours'=>'required|integer|min:1|max:24',
            'rating'=> 'required|regex:/^\d+(\.\d+)?$/|min:1|max:5',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->adress = $request->adress;
        $restaurant->phone = $request->phone;
        $restaurant->openingHours = $request->openingHours;
        $restaurant->rating = $request->rating;

        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $imageDateTime = now()->format('Y-m-d_H-i-s');
            $imageName = $imageDateTime.'-'.$imageName;
            $request->file('image')->storeAs('public/images',$imageName);
            $restaurant->image = $imageName;
        }
        
        $restaurant->save();

        return redirect()->route('restaurants.index')->with('success','restaurant added successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('pages.restaurants.show',compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('pages.restaurants.edit',compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:2|max:255',
            'description'=>'nullable|max:255',
            'adress'=>'required|string|max:255',
            'phone'=>'required|string|max:15',
            'openingHours'=>'required|integer|min:1|max:24',
            'rating'=> 'required|regex:/^\d+(\.\d+)?$/|min:1|max:5',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $restaurant = Restaurant::findOrFail($id);
        
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->adress = $request->adress;
        $restaurant->phone = $request->phone;
        $restaurant->openingHours = $request->openingHours;
        $restaurant->rating = $request->rating;

        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $imageDateTime = now()->format('Y-m-d_H-i-s');
            $imageName = $imageDateTime.'-'.$imageName;
            $request->file('image')->storeAs('public/images',$imageName);
            $restaurant->image = $imageName;
        }
        
        $restaurant->save();

        return redirect()->route('restaurants.index')->with('success','restaurant updated successfuly!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        return redirect()->route('restaurants.index')->with('success','restaurant deleted successfuly!');
    }
}
