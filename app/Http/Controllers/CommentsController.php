<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;   //ipmort model namespace here
use App\comment;    //ipmort model namespace here


class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $post = Post::findOrFail($request->post_id);
 
        Comment::create([
            'body' => $request->body,
            'post_id' => $post->id
        ]);

        return back();
    }
}
