<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::paginate(10);
        return view('pages.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.categories.create');
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
          "name"=>'required|min:2|max:255',
          'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $categorie = new Categorie();
        $categorie->name = $request->name;
        
        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $imageDateTime = now()->format('Y-m-d_H-i-s');
            $imageName = $imageDateTime.'-'.$imageName;
            $request->file('image')->storeAs('public/images',$imageName);
            $categorie->image = $imageName;
        }

        $categorie->save();

        return redirect()->route('categories.index')->with('success','Categorie added successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('pages.categories.show',compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('pages.categories.edit',compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name"=>'required|min:2|max:255',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
  
          $categorie = Categorie::findOrFail($id);
          $categorie->name = $request->name;
          
          if($request->hasFile('image')){
              $imageName = $request->file('image')->getClientOriginalName();
              $imageDateTime = now()->format('Y-m-d_H-i-s');
              $imageName = $imageDateTime.'-'.$imageName;
              $request->file('image')->storeAs('public/images',$imageName);
              $categorie->image = $imageName;
          }
  
          $categorie->save();
  
          return redirect()->route('categories.index')->with('success','Categorie added successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route('categories.index')->with('success','Categorie deleted successfuly!');
    }
}
