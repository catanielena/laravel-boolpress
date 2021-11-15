@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Dashboard') }}
                    <a href="{{route('admin.posts.create')}}" class="mt-10">
                        <button type="button" class="btn btn-primary">New post</button>
                    </a>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Content</th>
                            <th scope="col">Author</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)                              
                            <tr>
                              <th scope="row">{{$post->id}}</th>
                              <td>{{$post->title}}</td>
                              <td>{{$post->slug}}</td>
                              <td>{{$post->content}}</td>
                              <td>{{$post->author_lastName}} {{$post->author_firstName}}</td>
                              <td class="d-flex">
                                    <a href="{{route('admin.posts.show', $post->id)}}" class="ml-1">
                                        <button type="button" class="btn btn-light">View</button>
                                    </a>
                                    <a href="{{route('admin.posts.edit', $post->id)}}" class="ml-1">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="ml-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
