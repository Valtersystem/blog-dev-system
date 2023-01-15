<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // O método pluck pemite filtrar e listar elementos do array
        // passando o valor do atributo como referencia.
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {   
        $post = Post::create($request->all());
        
        if ($request->file('file')){
            $file = $request->file('file');
            $obj = Cloudinary::upload($file->getRealPath(),['folder' => 'posts']);
            $url =  $obj->getSecurePath();
            $urlId = $obj->getPublicId();

           $post->image()->create([
                'url' => $url,
                'urlId' => $urlId
           ]);
        }

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        Cache::flush();

       return redirect()->route('admin.posts.edit', $post);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {   
        $this->authorize('published', $post);
        
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('author', $post);

        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);

        $post->update($request->all());

        if ($request->file('file')) {

            $urlOld = $post->image->urlId;
        
            $file = $request->file('file');
            $obj = Cloudinary::upload($file->getRealPath(),['folder' => 'posts']);
            $url =  $obj->getSecurePath();
            $urlId =  $obj->getPublicId();

            if($post->image->url){
                // delete the image
                Cloudinary::destroy($urlOld);
                // update the image url
                $post->image->update([
                    'url' => $url,
                    'urlId' => $urlId
                ]);
            }else{
                // create the new image
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }

        Cache::flush();
        
        return redirect()->route('admin.posts.edit', $post)->with('info', 
        'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('author', $post);

        $post->delete();
        
        Cache::flush();
        return redirect()->route('admin.posts.index')->with('info','Post deleted');
    }
}
