@extends('layouts.guests')

@section('pageContent')
    <div class="post">
        <div class="post__txt">
            <p>{{$post->created_at->diffForHumans()}} <a href="#" class="author-link">{{$post->author_firstName}} {{$post->author_lastName}}</a></p>
            <h1>{{$post->title}}</h1>
            <p>{{$post->content}}</p>
        </div>
        <img src="https://awkwardfamilyphotos.com/wp-content/uploads/2021/11/Screen-Shot-2021-11-04-at-12.47.39-PM-1.jpg" alt="">
    </div>
@endsection