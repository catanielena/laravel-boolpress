@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Category') }}</div>
                
                <div class="card-body">
                    <h1>{{$category->name}}</h1>
                    <ul>
                        @forelse ($category['posts'] as $post)
                            <li><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></li>
                        @empty
                            <li>no posts</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
