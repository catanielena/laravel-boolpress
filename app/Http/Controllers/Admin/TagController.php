<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    protected $validationRules = [
        'name' => 'required | max:50 | unique'
    ];
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
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([$this->validationRules]);
        $newTag = new Tag();
        $newTag->fill($request->all());
        $newTag->slug = Str::of($request->name)->slug('-');
        $newTag->save();
        return redirect()->route('admin.posts.index')->with('success', "{$newTag->name} tag created successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $validation = $this->validationRules;
        $validation['name'] = $validation['name'] . $tag->id;
        $request->validate([$validation]);
        if($tag->name !== $request->name) {
            
            $tag->slug = Str::of($request->name)->slug('-');
        }
        $tag->fill($request->all());
        $tag->save();

        return redirect()->route('admin.posts.index')->with('success', "{$tag->name} tag edited successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tag = Tag::find($request->id);
        $tag->delete();
        return redirect()->route('admin.posts.index')->with('success', "The tag {$tag->name} has been successfully deleted");

    }
}
