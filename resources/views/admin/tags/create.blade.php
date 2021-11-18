@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new tag</strong></div>
                <div class="card-body">
                    <form action="{{route('admin.tags.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="title">Tag Name</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter title" name="name" value="{{old('name')}}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Create</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection