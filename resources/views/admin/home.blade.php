@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('admin.posts.create')}}" class="mt-10">
                        <button type="button" class="btn btn-primary">New post</button>
                    </a>
                    <a href="{{ route('admin.posts.index')}}">View all posts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
