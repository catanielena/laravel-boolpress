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
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)                              
                            <tr>
                              <th scope="row">{{$category->id}}</th>
                              <td>{{$category->name}}</td>
                              <td>{{$category->slug}}</td>
                              <td class="d-flex">
                                    <a href="{{route('admin.categories.show', $category->id)}}" class="ml-1">
                                        <button type="button" class="btn btn-light">View</button>
                                    </a>
                                    <a href="{{route('admin.categories.edit', $category->id)}}" class="ml-1">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    {{-- <form action="{{route('admin.categories.destroy', $category->id)}}" method="category" class="ml-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> --}}
                                    <button type="button" class="btn btn-danger ml-1 btn-delete" data-toggle="modal" data-target="#deleteModal" data-id="{{$category->id}}">
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
          <h5 class="modal-title" id="exampleModalLabel">Confirm category deletion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.categories.destroy', 'id')}}" method="POST" class="ml-1">
            @csrf
            @method('DELETE')
            <input type="hidden" id="delete-id" name="id">
            <div class="modal-body">
                Are you sure you want to delete this category?
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
