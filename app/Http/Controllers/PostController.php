<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Categorie;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use PhpParser\Node\Stmt\Foreach_;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['image', 'user', 'categories'])->orderBy('created_at', 'desc')->paginate(8);
        
        return view('Forum.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Forum.Post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id,
        ]);
        // add category if exist 
        if($request->has('categorie')){
            foreach($request->categorie as $Values){

                $categorie = PostCategorie::create([
                    'category_id' => $Values,
                    'post_id' => $post->id,
                // dd($request->categorie);
                
            ]);
        }
        }


        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $path = $image->store('posts');

                $post->image()->save(Image::make([
                    'path' => $path,
                ]));
            }
        };


        return redirect()->route('Forum.show', ['Forum' => $post->id ])->withStatus('Post Added !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with(['user', 'image', 'categories'])->findOrFail($id);

        return view('Forum.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);
        return view('Forum.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findorfail($id);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id,
        ]);

        if($request->has('categorie')){
            foreach($request->categorie as $Values){

                    if($post->categories){
                        foreach($post->categories as $relation)
                        $relation->delete();
                    }

                $categorie = PostCategorie::create([
                    'category_id' => $Values,
                    'post_id' => $post->id,
                // dd($request->categorie);
                
            ]);
            // dd($request->categorie);
            }
        }

        
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $path = $image->store('posts');
                if($post->image){
                    foreach($post->image as $allimages){
                        Storage::disk('public')->delete($allimages->path);
                        $allimages->delete();
                    }

                    $post->image()->save(Image::make([
                        'path' => $path, 
                    ]));    
                }
                else{
                    $post->image()->save(Image::make([
                        'path' => $path, 
                    ])); 
                }
            }
        }

        $post->save();

        return redirect()->route('Forum.show', ['Forum' => $post->id])->withStatus('Post Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorFail($id);
        $post->delete();
        
        if($post->comments){
            $post->comments()->delete();
        }

        if($post->categories){
            $post->categories()->delete();
        }

        return redirect()->route('Forum.index')->withStatus('Post Deleted !!');

    }
}
