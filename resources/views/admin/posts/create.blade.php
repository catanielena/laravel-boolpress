@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a new post</div>
                <div class="card-body">
                    <form action="{{route('admin.posts.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{old('title')}}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" rows="10" placeholder="Post content" name="content">{{old('content')}}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="text" class="form-control" id="image" placeholder="Enter image url" name="title" value="{{old('image')}}">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="author_firstName">Name</label>
                              <input type="text" class="form-control" id="author_firstName" placeholder="Name" name="author_firstName" value="{{old('author_firstName')}}">
                                @error('author_firstName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="author_lastName">Lastname</label>
                                <input type="text" class="form-control" id="author_lastName" placeholder="Lastname" name="author_lastName" value="{{old('author_lastName')}}">
                                @error('author_firstName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection