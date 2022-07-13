<?php

namespace App\Http\Controllers;

use App\UserMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all users from db  and check if user is logged in
        $data = [
            'userDetails' => Auth::check() && User::find(Auth::id()),
            'userIsLoggedIn' => Auth::check()
        ];

        // Parse posts to the index page
        return view('index', $data);
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
            'name' => 'string|required|min:5|max:100',
            'email' => 'required|email|min:5|max:100',
            'message' => 'string|required|min:5|max:255',
        ]);

        // If there are no validation errors create a post in the database with author id.
        $createPost = UserMessage::create($request->all());

        // If post is created, send a message back to the home page
        if($validatedData && $createPost) {
            Session::flash('success','Thank you for your message.');
            return redirect('/');
        }else{
            Session::flash('error', 'Unfortunately we could not send this message at this time, please try again later or contact our support team.');
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Message $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Application does not require editing
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $post)
    {
        // Application does not require updating of records
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $post)
    {
        // Application does not require deletion of records
    }
}
