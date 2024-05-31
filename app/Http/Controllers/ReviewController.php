<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::paginate(10);
        return view('pages.reviews.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.reviews.create');
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
            'comment'=> 'required|string|min:5|max:255',
            'rating'=> 'required|regex:/^\d+(\.\d+)?$/|min:1|max:5',
        ]);

        $review = new Review();
        $review->user_id = $request->user_id;
        $review->restaurant_id = $request->restaurant_id;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
    
        $review->save();

        return redirect()->route('reviews.index')->with('success','review added successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review= Review::findOrFail($id);
        return view('pages.reviews.show',compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review= Review::findOrFail($id);
        return view('pages.reviews.edit',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'restaurant_id'=>'required|exists:restaurants,id',
            'comment'=> 'required|string|min:5|max:255',
            'rating'=> 'required|regex:/^\d+(\.\d+)?$/|min:1|max:5',
        ]);

        $review= Review::findOrFail($id);

        $review->user_id = $request->user_id;
        $review->restaurant_id = $request->restaurant_id;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
    
        $review->save();

        return redirect()->route('reviews.index')->with('success','review updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review= Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviews.index')->with('success','review deleted successfuly!');
    }
}
