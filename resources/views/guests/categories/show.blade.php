@extends('layouts.guests')

@section('pageContent')
    <div class="category">
        <h1>{{ucfirst($category->name)}}</h1>
        <ul>
            @foreach ($category['posts'] as $post)
                <li>
                    <img src="{{$post->image}}" alt="{{$post->title}}">
                    <a href="{{route('posts.show', $post->slug)}}" class="_btn">&#8599;{{$post->title}}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection