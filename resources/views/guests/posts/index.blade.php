@extends('layouts.guests')

@section('pageContent')
    <div class="hero">
        <div class="hero__img">
            <h1>{{$posts[rand(0, count($posts) - 1)]->title}}</h1>
            <img src="{{$posts[rand(0, count($posts) - 1)]->image}}" alt="hero">
        </div>
    </div>
    <div class="posts">
        <ul class="posts__list">
            @foreach ($posts as $post)               
            <li class="list__item">
                <div class="item__card">
                    <div class="card__img">
                        <img src="{{$post->image}}" alt="{{$post->title}}">
                        <svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 767.94 1080" style="enable-background:new 0 0 767.94 1080;" xml:space="preserve">
                        <style type="text/css">
                            .st0{fill:rgb(255, 255, 255);}
                        </style>
                        <g>
                            <ellipse class="st0" cx="383.97" cy="540" rx="15.56" ry="57.64"/>
                            <path class="st0" d="M0,0v1080h767.94V0H0z M614.53,597.64c0,20.75-5.19,39.97-15.56,57.64c-10.38,17.69-24.41,31.7-42.08,42.08
                                c-17.69,10.37-36.89,15.56-57.64,15.56c0,20.75-5.19,39.97-15.56,57.64c-10.38,17.67-24.41,31.7-42.08,42.08
                                c-17.69,10.37-36.89,15.56-57.64,15.56c-20.75,0-39.97-5.19-57.64-15.56c-17.69-10.38-31.7-24.41-42.08-42.08
                                c-10.37-17.67-15.56-36.89-15.56-57.64c-20.75,0-39.97-5.19-57.64-15.56c-17.69-10.38-31.7-24.39-42.08-42.08
                                c-10.37-17.67-15.56-36.89-15.56-57.64s5.19-39.95,15.56-57.64c-10.37-17.67-15.56-36.89-15.56-57.64s5.19-39.95,15.56-57.64
                                c10.38-17.67,24.39-31.7,42.08-42.08c17.67-10.37,36.89-15.56,57.64-15.56c0-20.75,5.19-39.95,15.56-57.64
                                c10.38-17.67,24.39-31.7,42.08-42.08c17.67-10.37,36.89-15.56,57.64-15.56c20.75,0,39.95,5.19,57.64,15.56
                                c17.67,10.38,31.7,24.41,42.08,42.08c10.37,17.69,15.56,36.89,15.56,57.64c20.75,0,39.95,5.19,57.64,15.56
                                c17.67,10.38,31.7,24.41,42.08,42.08c10.37,17.69,15.56,36.89,15.56,57.64s-5.19,39.97-15.56,57.64
                                C609.34,557.69,614.53,576.89,614.53,597.64z"/>
                        </g>
                        </svg>

                    </div>
                    <h2>{{$post->title}}</h2>
                </div>
                <p>{{$post->content}}</p>
                <div class="card__btn">
                    <a href="{{route('posts.show', $post->slug)}}" class="_btn">more ...</a>
                </div>
                <span class="card__info">{{$post->created_at->diffForHumans()}} <a href="#" class="author-link">{{$post->author_firstName}} {{$post->author_lastName}}</a></span>
            </li>
            @endforeach
        </ul>
    </div>
    {{-- <p>{{$posts[0]->content}}</p> --}}
@endsection