<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all posts from db
        $allPosts = Post::all();

        // Check if user is logged in
        $userIsLoggedIn = Auth::check();

        // Parse posts to the index page
        return view('index', compact('allPosts','userIsLoggedIn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Redirect to the post creation form
        return view('actions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate user input
        $validatedData = $request->validate([
            'title' => 'string|required|min:5|max:200',
            'content' => 'string|required|min:5|max:1000',
        ]);

        // If there are no validation errors create a post in the database with Author id.
        $createPost = Post::create($request->all() + ['author' => Auth::id()]);

        // If the post is created send a success message back to the home page
        if($createPost) {
            Session::flash('success', $request->title . ' created successfully.');
            return redirect('/');
        }else{
            Session::flash('success', 'Error: ' . $request->title . ' could not be created.');
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the post that needs to be edited.
        $post = Post::find($id);

        // Parse the post information to the update view.
        return view('actions.update', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Validate the input before updating the post.
        $validatedData = $request->validate([
            'title' => 'string|required|min:5|max:200',
            'contents' => 'string|required|min:5|max:1000',
        ]);

        // Find the blog that needs to be updated by id and update all the content.
        $updatedPost = Post::findOrFail($post->id);
        $updatedPost->title = $request->title;
        $updatedPost->content = $request->contents;

        // Update the post content and send a message back to the main page.
        if($updatedPost->save()){
            Session::flash('success', $request->title . ' updated successfully.');
            return redirect('/');
        }else{
            Session::flash('error', 'Error: Post could not be updated');
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Find the post by id in the post model and delete it
        $posts = Post::find($post->id);
        $postName = $posts->name;

        // If post is deleted successfully send a success message back to the home page.
        if($posts->delete()){
            Session::flash('success', $postName . ' was deleted.');
            return redirect('/');
        }else{
            Session::flash('error', 'Error: ' . $postName . ' could not delete post');
            return redirect('/');
        }
    }
}
