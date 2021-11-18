@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a new post</div>
                <div class="card-body">
                    <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="category_id">Category</label>
                                </div>
                                <select class="custom-select" id="category_id" name="category_id">
                                    <option value="" disabled>--Choose the category-- </option>
                                    @foreach ($categories as $category)
                                    @if ($errors->any())
                                    <option {{old('category_id') == $category->id ? 'selected' : null}} value="{{$category->id}}">{{$category->name}}</option>
                                    @else
                                    <option {{isset($post['category']) && $post['category']['id'] == $category->id ? 'selected' : null}} value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{old('title') ?? $post->title}}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" rows="10" placeholder="Post content" name="content">{{old('content') ?? $post->content}}</textarea>
                            <small id="content" class="form-text text-muted">This field cannot be empty</small>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="text" class="form-control" id="image" placeholder="Enter image url" name="image" value="{{old('image') ?? $post->image }}">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="author_firstName">Name</label>
                              <input type="text" class="form-control" id="author_firstName" placeholder="Name" name="author_firstName" value="{{old('author_firstName') ?? $post->author_firstName}}">
                                @error('author_firstName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="author_lastName">Lastname</label>
                                <input type="text" class="form-control" id="author_lastName" placeholder="Lastname" name="author_lastName" value="{{old('author_lastName') ?? $post->author_lastName}}">
                                @error('author_firstName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Tags</p>
                            @foreach ($tags as $tag)    
                            <div class="form-check form-check-inline col-2">
                                @if ($errors->any())
                                <input {{in_array($tag['id'], old('tags', [])) ? 'checked' : null}} class="form-check-input" type="checkbox" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]">
                                @else
                                <input {{$post['tags']->contains($tag->id) ? 'checked' : null}} class="form-check-input" type="checkbox" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]">
                                @endif
                                <label class="form-check-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
                            </div>
                            @endforeach
                            @error('tags')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection