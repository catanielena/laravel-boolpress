<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{

    protected $validationRules = [
        'title' => 'required | max:150',
        'content' => 'required',
        'author_firstName' => 'required | max:50',
        'author_firstName' => 'required | max:50',
        'image' => 'required | max:255'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);
        $newPost = new Post();
        $newPost->fill($request->all());
        $newPost->slug = $this->getSlug($request->title);
        $newPost->save();
        return redirect()->route('admin.posts.index')->with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
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
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validationRules);
        $post = new Post();
        if($post->title !== $request->title) {
            
            $post->slug = $this->getSlug($request->title);
        }
        $post->fill($request->all());
        $post->save();
        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Post::find($request->id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'The post has been successfully deleted');
    }
    /**
     * getSlug
     *
     * @param  string  $title
     */
    private function getSlug($title)
    {
        $slug = Str::of($title)->slug('-');
        $postExist = Post::where('slug', $slug)->first();
        $i = 2;
        while( $postExist ) {
            $slug = Str::of($title)->slug('-') . "-{$i}";
            $postExist = Post::where('slug', $slug)->first();
            $i++;
        }

        return $slug;
    }
}
