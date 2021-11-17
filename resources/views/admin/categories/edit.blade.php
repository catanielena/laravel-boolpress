@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a new category</div>
                <div class="card-body">
                    <form action="{{route('admin.categories.update', $category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter category" name="name" value="{{old($category->name) ?? $category->name}}">
                            @error('name')
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