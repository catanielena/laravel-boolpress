@extends('layouts.guests')

@section('pageContent')
    <div class="post">
        <div class="post__txt">
            <p>{{$post->created_at->diffForHumans()}} <a href="#" class="author-link">{{$post->author_firstName}} {{$post->author_lastName}}</a></p>
            <h1>{{$post->title}}</h1>
            <p>{{$post->content}}</p>
        </div>
        <img src="{{$post->image}}" alt="">
    </div>
@endsection