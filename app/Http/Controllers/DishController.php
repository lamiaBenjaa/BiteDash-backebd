<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::paginate(10);
        return view('pages.dishes.index',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dishes.create');
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
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rating'=> 'required|regex:/^\d+(\.\d+)?$/|min:1|max:5',
            'restaurant_id' =>'required|exists:restaurants,id',
            'categorie_id' =>'required|exists:categories,id',
        ]);

        $dish = new Dish();
        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->restaurant_id = $request->restaurant_id;
        $dish->categorie_id = $request->categorie_id;

        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $imageDateTime = now()->format('Y-m-d_H-i-s');
            $imageName = $imageDateTime.'-'.$imageName;
            $request->file('image')->storeAs('public/images',$imageName);
            $dish->image = $imageName;
        }
        
        $dish->save();

        return redirect()->route('dishes.index')->with('success','dish added successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $dish = Dish::findOrFail($id);
        return view('pages.dishes.show',compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        return view('pages.dishes.edit',compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:2|max:255',
            'description'=>'nullable|max:255',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rating'=> 'required|regex:/^\d+(\.\d+)?$/|min:1|max:5',
            'restaurant_id' =>'required|exists:restaurants,id',
            'categorie_id' =>'required|exists:categories,id',
        ]);

        $dish = Dish::findOrFail($id);
        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->restaurant_id = $request->restaurant_id;
        $dish->categorie_id = $request->categorie_id;

        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $imageDateTime = now()->format('Y-m-d_H-i-s');
            $imageName = $imageDateTime.'-'.$imageName;
            $request->file('image')->storeAs('public/images',$imageName);
            $dish->image = $imageName;
        }
        
        $dish->save();

        return redirect()->route('dishes.index')->with('success','dish updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();

        return redirect()->route('dishes.index')->with('success','dish deleted successfuly!');

    }
}
