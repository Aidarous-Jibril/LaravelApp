<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post; //ipmort model namespace here
use App\comment; //ipmort model namespace here

class PostsController extends Controller
{
    /**
     * Create a new controller instance. HERE IS AUTH, construction copied from HomeCntrl
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]); //here show these except views
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch all post from model post
        //$posts = post::orderBy('title', 'desc')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = post::all();

        $posts = post::orderBy('created_at', 'desc')->paginate(5);
        return view ('posts/index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('/posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //add some validation here
           //$this->validate($request, [
            $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required'
    ]);
     //create post 
     $post = new post;
     $post->title = $request->input('title');
     $post->body = $request->input('body');
     $post->user_id = auth()->user()->id; //this row is for which user owns the post, accessing by auth 
     $post->save();

     //redirect
     return redirect('/posts')->with('success', 'Post created successfully');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //fetching just one post with id
        $post = post::find($id);
        return view ('posts/show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //fetch and find by Id
        $post = post::find($id);

         // Check for correct user
         if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view ('posts/edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //add some validation here   
            $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required'
    ]);
     //create post 
     $post =  post::find($id);
     $post->title = $request->input('title');
     $post->body = $request->input('body');
     $post->save();

     //redirect
     return redirect('/posts')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
    
        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        $post->delete();
        //redirect
        return redirect('/posts')->with('success', 'Post deleted successfully');
    }
}
