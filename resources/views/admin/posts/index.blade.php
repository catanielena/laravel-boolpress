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
                            <th scope="col">Image</th>
                            <th scope="col">Category</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)                              
                            <tr>
                              <th scope="row">{{$post->id}}</th>
                              <td>{{$post->title}}</td>
                              <td>{{$post->slug}}</td>
                              <td class="td--content">{{$post->content}}</td>
                              <td>{{$post->author_lastName}} {{$post->author_firstName}}</td>
                              <td class="text-break">{{$post->image}}</td>
                              <td>{{$post['category']['name'] ?? ''}}</td>
                              <td>
                                @foreach ($post['tags'] as $tag)
                                    <button type="button" class="btn btn-sm btn-outline-primary m-1">{{$tag->name}}</button>
                                @endforeach
                              </td>
                              <td class="d-flex">
                                    <a href="{{route('admin.posts.show', $post->id)}}" class="ml-1">
                                        <button type="button" class="btn btn-light">View</button>
                                    </a>
                                    <a href="{{route('admin.posts.edit', $post->id)}}" class="ml-1">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    {{-- <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="ml-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> --}}
                                    <button type="button" class="btn btn-danger ml-1 btn-delete" data-toggle="modal" data-target="#deleteModal" data-id="{{$post->id}}">
                                        Delete
                                    </button>
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm post deletion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.posts.destroy', 'id')}}" method="POST" class="ml-1">
            @csrf
            @method('DELETE')
            <input type="hidden" id="delete-id" name="id">
            <div class="modal-body">
                Are you sure you want to delete this post?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-primary">Delete</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection
