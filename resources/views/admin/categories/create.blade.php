@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a new category</div>
                <div class="card-body">
                    <form action="{{route('admin.categories.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter category" name="name" value="{{old('name')}}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection