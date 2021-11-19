<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    protected $validationRules = [
        'title' => 'required | max:150',
        'content' => 'required',
        'image' => 'required | max:255',
        'category_id' => 'nullable | exists:App\Category,id',
        'tags' => 'exists:App\Tag,id'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $user = Auth::user();
        $posts = $user->posts;
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
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
        $newPost->user_id = Auth::id();
        $newPost->save();
        $newPost->tags()->attach($request['tags']);
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
        $categories = Category::all();
        $tags = Tag::all();

        if($post->user_id !== Auth::id())
        {
            abort('403');
        }

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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

        if($post->title !== $request->title) {
            
            $post->slug = $this->getSlug($request->title);
        }
        // $post->user_id = Auth::id();
        $post->fill($request->all());
        $post->save();
        $post->tags()->sync($request['tags']);
        return redirect()->route('admin.posts.index')->with('success', 'The post has been successfully updated');
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
