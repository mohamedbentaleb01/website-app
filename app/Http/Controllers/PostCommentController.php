<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        // return response()->json([
        //     'post_id' => $post->id,
        //     'user_id' => $request->user()->id,
        //     'content' => $request->content,
        // ]);
        $request->validate([
            'content' => 'required|min:2|max:100',
        ]); 
        
        $comment = $post->comments()->create([
            'content' => $request->content,
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
        ]);

        $comment->save();

        return redirect()->route('Forum.show', ['Forum' => $post->id])->withStatus('Comment added successfully !');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Post $post, Comment $comment)
    {
        return response()->json(['post_id' => $post->id, 'comment_id' => $comment->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        $request->validate([
            'content' => 'required|min:2|max:100',
        ]);

        $comment = Comment::findorFail($request->id);
        $comment->update([
            'content' => $request->content,
        ]);

        $comment->save();
        return redirect()->route('Forum.show', ['Forum' => $post->id])->withStatus('Your Comment is Updated !!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
