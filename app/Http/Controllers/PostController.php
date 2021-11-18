<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        $categories = Category::all();
        return view('guests.posts.index', compact('posts', 'categories'));
    }

    public function show($slug) {
        $post = Post::where('slug', $slug)->first();
        return view('guests.posts.show', compact('post'));
    }
}
