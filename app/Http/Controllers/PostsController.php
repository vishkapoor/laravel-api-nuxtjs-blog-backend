<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Post::byDesc()->get());
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
     * @param Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Topic $topic)
    {  
        $this->validate($request, [
            'body' => 'required'
        ]);

        $post = Post::create([
            'body' => $request->body,
            'topic_id' => $topic->id,
            'user_id' => $request->user()->id
        ]);

        
        return new PostResource($post);

    }

    /**
     * Display the specified resource.
     * @param Topic $topic
     * @param Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic, Post $post)
    {
        return new PostResource($post);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic, Post $post)
    {
        $this->authorize('update', $post);

        $this->validate($request, [
            'body' => 'required|max:2000',
        ]);


        $post->update([
            'body' => $request->body
        ]);

        return new PostResource($post);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Topic $topic
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic, Post $post)
    {
        $this->authorize('destroy', $post);
        
        $post->delete();

        return response(null, 204);        
    }
}
