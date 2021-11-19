<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->first();
        if(!$category) {
            abort('404');
        }
        return view('guests.categories.show', compact('category', 'categories'));
    }
}
