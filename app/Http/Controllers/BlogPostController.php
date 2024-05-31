<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogPosts = BlogPost::paginate(10);
        return view('pages.posts.index',compact('blogPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.posts.create');
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
            'title'=>'required|string|max:100',
            'content'=> 'required|string|max:255',
        ]);

        $blogPost = new BlogPost();
        $blogPost->user_id = $request->user_id;
        $blogPost->title = $request->title;
        $blogPost->content = $request->content;
    
        $blogPost->save();

        return redirect()->route('posts.index')->with('success','post added successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogPost= BlogPost::findOrFail($id);
        return view('pages.posts.show',compact('blogPost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogPost= BlogPost::findOrFail($id);
        return view('pages.posts.edit',compact('blogPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'title'=>'required|string|max:100',
            'content'=> 'required|string|max:255',
        ]);

        $blogPost= BlogPost::findOrFail($id);

        $blogPost->user_id = $request->user_id;
        $blogPost->title = $request->title;
        $blogPost->content = $request->content;
    
        $blogPost->save();

        return redirect()->route('posts.index')->with('success','post updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogPost= BlogPost::findOrFail($id);
        $blogPost->delete();

        return redirect()->route('posts.index')->with('success','post deleted successfuly!');
    }
}
