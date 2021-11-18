@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit the tag <strong>#{{$tag->id}}</strong></div>
                <div class="card-body">
                    <form action="{{route('admin.tags.update', $tag->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="title">Tag Name</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter title" name="name" value="{{old('name') ?? $tag->name}}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger ml-1 btn-delete" data-toggle="modal" data-target="#deleteModal" data-id="{{$tag->id}}">
                            Delete
                        </button>
                      </form>
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
          <h5 class="modal-title" id="exampleModalLabel">Confirm tag deletion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.tags.destroy', 'id')}}" method="POST" class="ml-1">
            @csrf
            @method('DELETE')
            <input type="hidden" id="delete-id" name="id">
            <div class="modal-body">
                Are you sure you want to delete this tag?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection