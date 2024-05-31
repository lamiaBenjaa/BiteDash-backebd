<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = Favorite::paginate(10);
        return view('pages.favorites.index',compact('favorites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.favorites.create');
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
            'user_id'=>'required|exists:users,id',
            'restaurant_id'=>'required|exists:restaurants,id',
        ]);

        $favorite = new Favorite();
        $favorite->user_id = $request->user_id;
        $favorite->restaurant_id = $request->restaurant_id;
    
        $favorite->save();

        return redirect()->route('favorites.index')->with('success','favorite added successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $favorite= Favorite::findOrFail($id);
        return view('pages.favorites.show',compact('favorite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $favorite= Favorite::findOrFail($id);
        return view('pages.favorites.edit',compact('favorite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'restaurant_id'=>'required|exists:restaurants,id',
        ]);

        $favorite= Favorite::findOrFail($id);

        $favorite->user_id = $request->user_id;
        $favorite->restaurant_id = $request->restaurant_id;
    
        $favorite->save();

        return redirect()->route('favorites.index')->with('success','favorite updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favorite= Favorite::findOrFail($id);
        $favorite->delete();

        return redirect()->route('favorites.index')->with('success','favorite deleted successfuly!');
    }
}
